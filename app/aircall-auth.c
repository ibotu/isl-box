#include <stdbool.h>
#include <string.h>
#include "nrf.h"
#include "nrf_drv_uart.h"
#include "sdk_config.h"
#include "lwip/init.h"
#include "lwip/dns.h"
#include "lwip/sockets.h"
#include "lwip/netdb.h"
#include "cJSON.h"

#define UART_TX_PIN         6
#define UART_RX_PIN         8
#define UART_BAUDRATE       NRF_UART_BAUDRATE_9600
#define TCP_SERVER_NAME     "api.aircall.io"
#define TCP_SERVER_PORT     80
#define CLIENT_ID           "<YOUR_CLIENT_ID>"
#define CLIENT_SECRET       "<YOUR_CLIENT_SECRET>"
#define REDIRECT_URI        "https://localhost:8000/callback"
#define AUTH_CODE           "<YOUR_AUTHORIZATION_CODE>"

static char access_token[256];
static uint16_t token_expires_in;

static void uart_event_handler(nrf_drv_uart_event_t const * p_event, void * p_context) {
    // Handle UART events here
}

static int http_get(const char *url, const char *auth_header, char *response, uint16_t *response_len) {
    struct hostent *he;
    struct sockaddr_in server_addr;
    int tcp_sockfd, bytes_received, total_received = 0;
    char *request;
    uint16_t request_len;

    // Resolve server IP address
    if ((he = gethostbyname(TCP_SERVER_NAME)) == NULL) {
        printf("Error resolving DNS: %s\n", TCP_SERVER_NAME);
        return -1;
    }

    // Create socket and connect to server
    if ((tcp_sockfd = socket(AF_INET, SOCK_STREAM, 0)) < 0) {
        printf("Error creating socket\n");
        return -1;
    }
    memset(&server_addr, 0, sizeof(server_addr));
    server_addr.sin_family = AF_INET;
    server_addr.sin_port = htons(TCP_SERVER_PORT);
    server_addr.sin_addr = *((struct in_addr *)he->h_addr);
    if (connect(tcp_sockfd, (struct sockaddr *)&server_addr, sizeof(server_addr)) < 0) {
        printf("Error connecting to server\n");
        return -1;
    }

    // Construct HTTP request
    request_len = asprintf(&request, "GET %s HTTP/1.1\r\n"
                                     "Host: %s\r\n"
                                     "Authorization: %s\r\n"
                                     "Connection: close\r\n"
                                     "\r\n",
                           url, TCP_SERVER_NAME, auth_header);

    // Send HTTP request to server
    if (send(tcp_sockfd, request, request_len, 0) < 0) {
        printf("Error sending data to server\n");
        return -1;
    }

    // Receive HTTP response from server
    while ((bytes_received = recv(tcp_sockfd, response + total_received, *response_len - total_received, 0)) > 0) {
        total_received += bytes_received;
    }

    // Null-terminate response
    response[total_received] = '\0';

    // Update response length
    *response_len = total_received;

    return 0;
}

int main
