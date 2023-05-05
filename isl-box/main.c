#ifndef VNC2_H
#define VNC2_H

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdint.h>
#include <stdbool.h>

// Constants and Macros
#define MAX_BUFFER_SIZE 256
#define GSM_PHONE_NUMBER "+1234567890"
#define GSM_MESSAGE_LENGTH 160
#define WEB_SERVER_URL "http://example.com/api/scanner"

// Typedefs
typedef struct {
    uint8_t data[MAX_BUFFER_SIZE]; // buffer to store received data
    uint16_t length; // number of bytes received
} usb_data_t;

// Function Prototypes
void init_vnc2(void);
bool send_to_pos(usb_data_t *data);
bool send_to_gsm_network(char* phone_number, char* message);
bool send_to_web_server(char* url, char* data);

#endif /* VNC2_H */
