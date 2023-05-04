#include <net/httpc.h>

/* Function to send a POST request to the Aircall API to create a new activity */
int create_aircall_activity(const char *token, const char *data, size_t len)
{
    int err;
    static httpc_handle_t httpc_handle;
    static struct httpc_request request = {
        .method = HTTP_POST,
        .url = API_ENDPOINT,
        .headers = {
            { "Authorization", token },
            { "Content-Type", "application/json" },
        },
        .payload = data,
        .payload_len = len,
    };
    struct httpc_response response;

    /* Initialize the HTTP client */
    err = httpc_init(&httpc_handle);
    if (err) {
        printk("Error initializing HTTP client: %d\n", err);
        return err;
    }

    /* Send the POST request to the Aircall API */
    err = httpc_request(&httpc_handle, &request, &response);
    if (err) {
        printk("Error sending POST request to Aircall API: %d\n", err);
        httpc_cleanup(&httpc_handle);
        return err;
    }

    /* Check the HTTP status code */
    if (response.status_code != 201) {
        printk("Error creating activity on Aircall API: %d\n", response.status_code);
        httpc_cleanup(&httpc_handle);
        return -1;
    }

    /* Print the HTTP response */
    printk("Aircall API response: %.*s\n", response.payload_len, response.payload);

    /* Clean up the HTTP client */
    httpc_cleanup(&httpc_handle);

    return 0;
}
