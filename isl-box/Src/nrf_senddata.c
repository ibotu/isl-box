#include <zephyr.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <drivers/uart.h>
#include <net/socket.h>
#include <net/tls_credentials.h>
#include <modem/lte_lc.h>

/* UART configuration */
#define UART_DEVICE_NAME  "UART_0"
#define UART_BUF_SIZE     64
#define UART_TIMEOUT_MS   100

/* Aircall API configuration */
#define API_HOSTNAME      "api.aircall.io"
#define API_PORT          443
#define API_ENDPOINT      "/v1/calls"
#define API_TOKEN         "YOUR_API_TOKEN"

/* Function to send barcode data to Aircall API */
int send_barcode_data(const char *data, size_t len)
{
    int err;
    struct addrinfo *addr;
    struct addrinfo hints = {
        .ai_family = AF_UNSPEC,
        .ai_socktype = SOCK_STREAM
    };
    char request[128];
    char response[512];
    int sock;
    ssize_t bytes;
    size_t total_sent = 0;

    /* Get the IP address of the API hostname */
    err = getaddrinfo(API_HOSTNAME, NULL, &hints, &addr);
    if (err) {
        printk("Error getting address for %s: %d\n", API_HOSTNAME, err);
        return err;
    }

    /* Create a TCP socket */
    sock = socket(addr->ai_family, addr->ai_socktype, IPPROTO_TLS_1_2);
    if (sock < 0) {
        printk("Error creating socket: %d\n", sock);
        freeaddrinfo(addr);
        return sock;
    }

    /* Set up TLS credentials */
    struct sec_tag_list tls_tag_list = {
        .s32_num_tags = 1,
        .au32_sec_tag = { CONFIG_AIRCALL_TLS_SEC_TAG }
    };

    /* Connect to the API endpoint */
    err = connect(sock, addr->ai_addr, addr->ai_addrlen);
    if (err) {
        printk("Error connecting to %s:%d: %d\n", API_HOSTNAME, API_PORT, err);
        close(sock);
        freeaddrinfo(addr);
        return err;
    }

    /* Start TLS session */
    err = setsockopt(sock, SOL_TLS, TLS_SEC_TAG_LIST, &tls_tag_list, sizeof(tls_tag_list));
    if (err) {
        printk("Error setting TLS sec tag list: %d\n", err);
        close(sock);
        freeaddrinfo(addr);
        return err;
    }

    err = setsockopt(sock, SOL_TLS, TLS_HOSTNAME, API_HOSTNAME, strlen(API_HOSTNAME));
    if (err) {
        printk("Error setting TLS hostname: %d\n", err);
        close(sock);
        freeaddrinfo(addr);
        return err;
    }

    err = setsockopt(sock, SOL_TLS, TLS_CIPHERSUITE_LIST, "TLS-ALL:+ECDHE-ECDSA-AES128-SHA256", 34);
    if (err) {
        printk("Error setting TLS ciphersuite: %d\n", err);
        close(sock);
        freeaddrinfo(addr);
        return err;
    }

    /* Build HTTP request */
    snprintf(request, sizeof(request), "POST %s HTTP/1.1\r\n"
                                         "Host: %s:%d\r\n"
                                         "Authorization: Bearer %s\r\n"
                                         "Content-Type: application/json
                                     "Content-Length: %zd\r\n"
                                     "\r\n"
                                     "%s",
         API_ENDPOINT, API_HOSTNAME, API_PORT, API_TOKEN, len, data);

/* Send HTTP request */
while (total_sent < strlen(request)) {
    bytes = send(sock, request + total_sent, strlen(request) - total_sent, 0);
    if (bytes < 0) {
        printk("Error sending HTTP request: %d\n", bytes);
        close(sock);
        freeaddrinfo(addr);
        return bytes;
    }
    total_sent += bytes;
}

/* Receive HTTP response */
bytes = recv(sock, response, sizeof(response), 0);
if (bytes < 0) {
    printk("Error receiving HTTP response: %d\n", bytes);
    close(sock);
    freeaddrinfo(addr);
    return bytes;
}
response[bytes] = '\0';

/* Print HTTP response */
printk("HTTP response: %s\n", response);

/* Clean up */
close(sock);
freeaddrinfo(addr);

return 0;
}

/* Function to receive barcode data over UART and send it to Aircall API */
void nRF9160_SendBarcodeData(void)
{
int err;
char barcode_data[UART_BUF_SIZE];
size_t barcode_len;

/* Open the UART device */
const struct device *uart_dev = device_get_binding(UART_DEVICE_NAME);
if (!uart_dev) {
    printk("Error opening UART device %s\n", UART_DEVICE_NAME);
    return;
}

/* Set the UART configuration */
const struct uart_config uart_cfg = {
    .baudrate = 115200,
    .parity = UART_CFG_PARITY_NONE,
    .stop_bits = UART_CFG_STOP_BITS_1,
    .data_bits = UART_CFG_DATA_BITS_8,
    .flow_ctrl = UART_CFG_FLOW_CTRL_NONE,
};
err = uart_configure(uart_dev, &uart_cfg);
if (err) {
    printk("Error configuring UART device %s: %d\n", UART_DEVICE_NAME, err);
    return;
}

/* Loop forever, receiving barcode data and sending it to the Aircall API */
while (1) {
    /* Receive barcode data over UART */
    err = uart_fifo_read(uart_dev, barcode_data, sizeof(barcode_data), UART_TIMEOUT_MS);
    if (err < 0) {
        printk("Error reading from UART device %s: %d\n", UART_DEVICE_NAME, err);
        continue;
    }
    barcode_len = err;

    /* Send barcode data to Aircall API */
    err = send_barcode_data(barcode_data, barcode_len);
    if (err) {
        printk("Error sending barcode data to Aircall API: %d\n", err);
        continue;
    }
}
