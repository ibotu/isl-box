#include <vnc2.h>
#include <stdio.h>
#include <string.h>
 
// Define the VNC2 USB host object
USBHID usb;
 
// Define the callback function for receiving data from the USB HID device
void hidDataCallback(uint8_t *data, uint16_t len)
{
    // Convert the received data to a null-terminated string
    char message[len+1];
    memcpy(message, data, len);
    message[len] = '\0';
 
    // Print the received message to the console
    printf("Received barcode: %s\n", message);
}
 
int main()
{
    // Initialize the VNC2 USB host controller
    usb.init();
 
    // Register the HID data callback function
    usb.registerHIDDataCallback(hidDataCallback);
 
    // Wait for a USB HID device to be connected
    while (!usb.isEnumerated()) {
        usb.task();
    }
 
    // Main loop
    while (1) {
        // Process USB HID events
        usb.task();
    }
 
    return 0;
}
 