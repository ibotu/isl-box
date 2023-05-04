#include <zephyr.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <net/httpc.h>
#include <net/socket.h>
#include <modem/lte_lc.h>
#include <modem/modem_info.h>
#include <modem/at_cmd.h>
#include <modem/at_notif.h>
#include <logging/log.h>

#define MAX_URL_LEN 256
#define MAX_FIELD_LEN 256
#define MAX_HEADERS 16

#define API_HOSTNAME "api.aircall.io"
#define API_PORT 443
#define API_ENDPOINT "/v1/insights"
#define API_TOKEN "YOUR_API_TOKEN_HERE"

#define TLS_SEC_TAG 101
#define TLS_CA_CERT_FILE "/mnt/data/ca.pem"
#define TLS_DEVICE_CERT_FILE "/mnt/data/client.pem"
#define TLS_DEVICE_KEY_FILE "/mnt/data/client.key"

#define GPS_TIMEOUT 30

#define NETWORK_TIMEOUT_MS 30000

#define LOG_MODULE_NAME net_http_example
LOG_MODULE_REGISTER(LOG_MODULE_NAME);

static struct http_request request;
static char url[MAX_URL_LEN];
static char header_fields[MAX_HEADERS][MAX_FIELD_LEN];
static char header_values[MAX_HEADERS][MAX_FIELD_LEN];
static int num_headers;

static void http_response_callback(struct http_response *rsp,
                                   enum http_final_call final_data,
                                   void *user_data)
{
    if (final_data == HTTP_DATA_MORE && rsp->data_len > 0) {
        LOG_HEXDUMP_DBG(rsp->data, rsp->data_len, "Received data:");
    } else {
        LOG_INF("HTTP Response status: %d", rsp->http_status);
    }
}

static void set_request_headers(void)
{
    // Set the Authorization header
    snprintf(header_fields[num_headers], MAX_FIELD_LEN, "Authorization");
    snprintf(header_values[num_headers], MAX_FIELD_LEN, "Bearer %s", API_TOKEN);
    num_headers++;

    // Set the Content-Type header
    snprintf(header_fields[num_headers], MAX_FIELD_LEN, "Content-Type");
    snprintf(header_values[num_headers], MAX_FIELD_LEN, "application/json");
    num_headers++;
}

static int httpc_send_request(void)
{
    int err;

    // Build the HTTP request URL
    snprintf(url, MAX_URL_LEN, "https://%s:%d%s", API_HOSTNAME, API_PORT, API_ENDPOINT);

    // Set the HTTP request options
    request.method = HTTP_POST;
    request.url = url;
    request.protocol = "HTTP/1.1";
    request.host = API_HOSTNAME;
    request.port = API_PORT;
    request.payload = NULL;
    request.payload_len = 0;
    request.header_fields = header_fields;
    request.header_values = header_values;
    request.num_headers = num_headers;
    request.response = http_response_callback;

    // Send the HTTP request
    err = httpc_request(&request, NETWORK_TIMEOUT_MS);
    if (err) {
        LOG_ERR("Failed to send HTTP request: %d", err);
        return err;
    }

    return 0;
}

static void get_location(float *latitude, float *longitude)
{
    // TODO: Implement GPS location retrieval using nRF9160 GPS APIs
}

static void get_datetime(char *datetime)
{
    // TODO: Implement datetime retrieval using nRF9160 date/time APIs
}

static void build_insight_card(char *card_data, float latitude, float longitude, char *datetime)
{
    // Build the insight card JSON object
    snprintf(card_data, MAX_FIELD_LEN, "{\"latitude\":%f,\"longitude\":%f,\"datetime\":\"%s\"}", latitude, longitude, datetime);


// Initialize the LTE modem
err = lte_lc_init_and_connect();
if (err) {
    LOG_ERR("Failed to initialize LTE modem: %d", err);
    return;
}

// Wait for the network registration to complete
err = lte_lc_wait_for_network(NETWORK_TIMEOUT_MS);
if (err) {
    LOG_ERR("Failed to register with network: %d", err);
    return;
}

// Retrieve the GPS location
err = gps_get_location(&latitude, &longitude, GPS_TIMEOUT);
if (err) {
    LOG_ERR("Failed to retrieve GPS location: %d", err);
    return;
}

// Retrieve the current date and time
get_datetime(datetime);

// Send the insight card to the Aircall API
err = send_insight_card(latitude, longitude, datetime);
if (err) {
    LOG_ERR("Failed to send insight card: %d", err);
    return;
}
static int send_insight_card(float latitude, float longitude, char *datetime)

{
int err;
char card_data[MAX_FIELD_LEN];
}
// Build the insight card JSON object
build_insight_card(card_data, latitude, longitude, datetime);

// Set the request headers
num_headers = 0;
set_request_headers();

// Send the HTTP request
err = httpc_send_request();
if (err) {
    return err;
}

return 0;
}

void main(void)

int err;
float latitude;
float longitude;
char datetime[MAX_FIELD_LEN];

// Initialize the LTE modem
err = lte_lc_init_and_connect();
if (err) {
    LOG_ERR("Failed to initialize LTE modem: %d", err);
    return;
}

// Wait for the network registration to complete
err = lte_lc_wait_for_network(NETWORK_TIMEOUT_MS);
if (err) {
    LOG_ERR("Failed to register with network: %d", err);
    return;
}

// Retrieve the GPS location
err = gps_get_location(&latitude, &longitude, GPS_TIMEOUT);
if (err) {
    LOG_ERR("Failed to retrieve GPS location: %d", err);
    return;
}

// Retrieve the current date and time
get_datetime(datetime);

// Send the insight card to the Aircall API
err = send_insight_card(latitude, longitude, datetime);
if (err) {
    LOG_ERR("Failed to send insight card: %d", err);
    return;
}
