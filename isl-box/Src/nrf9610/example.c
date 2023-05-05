#include "VNC2.h"
#include "uart.h"

// USB port 1 setup for USB host
USBHID usb1(HID_MOUSE);

// USB port 2 setup for USB HID slave
USBHID usb2(HID_KEYBOARD);

// UART setup
UART uart(UART_BAUD_9600, UART_DATABITS_8, UART_STOPBITS_1, UART_PARITY_NONE, UART_FLOWCONTROL_NONE);

// Buffer for incoming UART data
char uart_buffer[256];

// Main program loop
void main() {
  // Initialize USB host on port 1
  usb1.init();
  
  // Initialize USB HID slave on port 2
  usb2.init();
  
  // Initialize UART
  uart.init();
  
  // Main loop
  while(1) {
// Check for USB host events on port 1
        if(usb1.isConnected()) {
        // Handle USB host events
        if(usb1.isEnumerationComplete()) {
            // Enumeration process is complete, check for a HID class device
            USBDevice *dev = usb1.getDeviceByClass(HID_CLASS);
            if(dev != NULL) {
            // Found a HID class device, do something with it
            int report_length = usb2.getReportLength();
            } else {
            // HID class device not found, restart the enumeration process
            usb1.restartEnumeration();
            }
        }
        } else {
        // USB port 1 disconnected, restart the enumeration process
        usb1.restartEnumeration();
        }
    
    // Check for USB HID slave events on port 2
    if(usb2.isConnected()) {
      // Handle USB HID slave events
      // ...
      // USB port 2 setup for USB HID slave
        USBHID usb2(HID_KEYBOARD);

        // Set the manufacturer for USB port 2
        usb2.setManufacturer("My Manufacturer");

        // Set the product and serial number for USB port 2 to look like a generic keyboard
        usb2.setProductString("USB Keyboard");
        usb2.setSerialString("12345");
    }
    
    // Check for incoming UART data
    if(uart.available()) {
      // Read incoming UART data into buffer
      int num_bytes = uart.readBytes(uart_buffer, sizeof(uart_buffer));
      
      // Handle incoming UART data
      // ...
    }
  }
}


