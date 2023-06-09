#include "nrf9160.h"
#include "uart.h"
#include <net/socket.h>

// Define the UART buffer and index variables
static uint8_t uart_buffer[UART_BUFFER_SIZE];
static uint32_t uart_index = 0;

void nRF9160_Init(void)
{
    // Initialize the UART interface
    UART_Init();

    // Initialize any necessary network connections
    // ...
}

void nRF9160_SendBarcodeData(const uint8_t *buf, uint32_t len)
{
    // Parse the USB HID report into a barcode string
    char barcode[MAX_BARCODE_LEN];
    memset(barcode, 0, sizeof(barcode));
    for(int i=0; i<len; i++)
    {
        barcode[i] = (char)buf[i];
    }

    // Send the barcode data to the Aircall API
    struct addrinfo *res;
    char port[] = "443";
    int err = getaddrinfo(API_ENDPOINT, port, NULL, &res);
    if(err != 0 || res == NULL)
    {
        // Handle error
        return;
    }

    int sock = socket(res->ai_family, res->ai_socktype, res->ai_protocol);
    if(sock < 0)
    {
        // Handle error
        freeaddrinfo(res);
        return;
    }

    err = connect(sock, res->ai_addr, res->ai_addrlen);
    if(err < 0)
    {
        // Handle error
        close(sock);
        freeaddrinfo(res);
        return;
    }

    char request[512];
    snprintf(request, sizeof(request), "POST /calls HTTP/1.1\r\n"
                                         "Authorization: Basic %s\r\n"
                                         "Content-Type: application/json\r\n"
                                         "Content-Length: %d\r\n"
                                         "Host: %s\r\n"
                                         "\r\n"
                                         "{\"number\": \"%s\"}",
                                         API_KEY,
                                         strlen(barcode),
                                         API_ENDPOINT,
                                         barcode);

    err = send(sock, request, strlen(request), 0);
    if(err < 0)
    {
        // Handle error
        close(sock);
        freeaddrinfo(res);
        return;
    }

    // Close the socket and free the address info structure
    close(sock);
    freeaddrinfo(res);
}

// UART interrupt handler function
void UART_Handler(void)
{
    uint8_t ch;
    if(UART_ReadData(&ch, 1) > 0)
    {
    // Add the received character to the UART buffer
    uart_buffer[uart_index++] = ch;

    // Check if the buffer is full or a newline character was received
    if(uart_index >= UART_BUFFER_SIZE || ch == '\n')
    {
        // Parse the USB HID report from the UART buffer
        uint32_t report_len = 0;
        uint8_t report[MAX_BARCODE_LEN];
        memset(report, 0, sizeof(report));
        for(int i=2; i<uart_index; i++)
        {
            if(i % 2 == 0)
            {
                report[report_len++] = (uart_buffer[i-1] << 4) | uart_buffer[i];
            }
        }

        // Send the USB HID report to the Aircall API
        nRF9160_SendBarcodeData(report, report_len);

        // Clear the UART buffer and index
        memset(uart_buffer, 0, sizeof(uart_buffer));
        uart_index = 0;
    }
}
