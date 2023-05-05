#include "VNC2.h"

// Define mutex object
Mutex my_mutex;

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
  my_mutex.lock();
  usb1.init();
  my_mutex.unlock();
  
  // Initialize USB HID slave on port 2
  my_mutex.lock();
  usb2.init();
  my_mutex.unlock();
  
  // Initialize UART
  my_mutex.lock();
  uart.init();
  my_mutex.unlock();
  
  // Main loop
  while(1) {
    // Check for USB host events on port 1
    my_mutex.lock();
    if(usb1.isConnected()) {
      // Handle USB host events
      // ...
    }
    my_mutex.unlock();
    
    // Check for USB HID slave events on port 2
    my_mutex.lock();
    if(usb2.isConnected()) {
      // Handle USB HID slave events
      // ...
    }
    my_mutex.unlock();
    
    // Check for incoming UART data
    my_mutex.lock();
    if(uart.available()) {
      // Read incoming UART data into buffer
      int num_bytes = uart.readBytes(uart_buffer, sizeof(uart_buffer));
      
      // Handle incoming UART data
      // ...
    }
    my_mutex.unlock();
  }
}
