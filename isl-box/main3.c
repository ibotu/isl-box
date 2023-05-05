#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdint.h>
#include <stdbool.h>

#include "vnc2.h"
#include "nrf9160.h"

int main(void) {
    init_vnc2();
    init_nrf9160();

    usb_data_t scanned_data;
    while (true) {
        // Read data from the USB scanner
        if (receive_from_scanner(&scanned_data)) {
            // Forward the scanned EAN to the POS
            if (!send_to_pos(&scanned_data)) {
                printf("Error: failed to send scanned data to POS\n");
            }

            // Send the scanned EAN as an SMS message to the GSM network
            char message[GSM_MESSAGE_LENGTH];
            snprintf(message, sizeof(message), "Scanned EAN: %s", scanned_data.data);
            if (!send_to_gsm_network(GSM_PHONE_NUMBER, message)) {
                printf("Error: failed to send scanned data to GSM network\n");
            }

            // Send the scanned EAN to the web server
            if (!send_to_web_server(WEB_SERVER_URL, scanned_data.data)) {
                printf("Error: failed to send scanned data to web server\n");
            }
        } else {
            printf("Error: failed to receive data from USB scanner\n");
        }
   
