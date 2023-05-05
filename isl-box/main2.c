#include <stdio.h>
#include "vnc2.h"
#include "nrf9160.h"
#include "usb_scanner.h"
#include "aircall_api.h"
#include "web_server.h"

int main(void) {
    init_vnc2();
    init_nrf9160();
    init_usb_scanner();
    init_aircall_api();
    init_web_server();

    usb_data_t data;
    while (true) {
        if (receive_from_scanner(&data)) {
            send_to_pos(&data);
            char ean[MAX_BUFFER_SIZE];
            sprintf(ean, "%s", data.data);
            send_to_aircall_api(GSM_PHONE_NUMBER, ean);
            send_to_web_server(WEB_SERVER_URL, ean);
        }
    }

    return 0;
}
