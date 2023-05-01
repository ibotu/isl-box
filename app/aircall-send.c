#include <stdbool.h>
#include <string.h>
#include "nrf.h"
#include "nrf_drv_uart.h"
#include "sdk_config.h"
#include "lwip/init.h"
#include "lwip/dns.h"
#include "lwip/sockets.h"
#include "lwip/netdb.h"

#define UART_TX_PIN     6
#define UART_RX_PIN     8
#define UART_BAUDRATE   NRF_UART_BAUDRATE_9600
#define TCP_SERVER_NAME "aircall.com"
#define TCP_SERVER_PORT 80

static char rx_buffer[256];
static uint16_t rx_index = 0;

static void uart_event_handler(nrf_drv_uart_event_t const * p_event, void * p_context) {
    if (p_event->type == NRF_DRV_UART_EVT_RX_DONE) {
        rx_buffer[rx_index++] = p_event->data.rxtx.p_data[0];
        nrf_drv_uart_rx(p_event->uarta.p_instance, (uint8_t *)(&rx_buffer[rx_index]), 1);
    }
}

int main(void) {
    struct hostent *he;
    struct sockaddr_in server_addr;
    int tcp_sockfd;
    uint16_t len;

    // Initialize UART
    nrf_drv_uart_t uart_instance = NRF_DRV_UART_INSTANCE(0);
    nrf_drv_uart_config_t uart_config = NRF_DRV_UART_DEFAULT_CONFIG;
    uart_config.baudrate = UART_BAUDRATE;
    uart_config.pselrxd = UART_RX_PIN;
    uart_config.pseltxd = UART_TX_PIN;
    nrf_drv_uart_init(&uart_instance, &uart_config, uart_event_handler, NULL);
    nrf_drv_uart_rx_enable(&uart_instance);

    // Initialize TCP/IP stack
    lwip_init();
    tcpip_init(NULL, NULL);

    // Resolve server IP address
    if ((he = gethostbyname(TCP_SERVER_NAME)) == NULL) {
        printf("Error resolving DNS: %s\n", TCP_SERVER_NAME);
        return 1;
    }

    // Create socket and connect to server
    if ((tcp_sockfd = socket(AF_INET, SOCK_STREAM, 0)) < 0) {
        printf("Error creating socket\n");
        return 1;
    }
    memset(&server_addr, 0, sizeof(server_addr));
    server_addr.sin_family = AF_INET;
    server_addr.sin_port = htons(TCP_SERVER_PORT);
    server_addr.sin_addr = *((struct in_addr *)he->h_addr);
    if (connect(tcp_sockfd, (struct sockaddr *)&server_addr, sizeof(server_addr)) < 0) {
        printf("Error connecting to server\n");
        return 1;
    }

    // Receive barcode data over UART and send to server
    while (true) {
        len = nrf_drv_uart_rx(&uart_instance, (uint8_t *)rx_buffer, sizeof(rx_buffer));
    
    if (len > 0) {
        // Process received data
        // ...

        // Send data to server
        if (send(tcp_sockfd, rx_buffer, len, 0) < 0) {
            printf("Error sending data to server\n");
            return 1;
        }
    }
}
