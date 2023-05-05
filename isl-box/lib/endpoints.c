#include "usb.h"

// Define constants for the endpoint addresses and sizes
#define INTERRUPT_ENDPOINT_ADDRESS 0x81
#define INTERRUPT_ENDPOINT_SIZE 64

#define BULK_ENDPOINT_ADDRESS 0x02
#define BULK_ENDPOINT_SIZE 512

// Initialize the USB endpoints
void usb_init_endpoints() {
    // Register the interrupt endpoint
    usb_register_endpoint(INTERRUPT_ENDPOINT_ADDRESS, USB_ENDPOINT_TYPE_INTERRUPT, INTERRUPT_ENDPOINT_SIZE);

    // Register the bulk endpoint
    usb_register_endpoint(BULK_ENDPOINT_ADDRESS, USB_ENDPOINT_TYPE_BULK, BULK_ENDPOINT_SIZE);
}
