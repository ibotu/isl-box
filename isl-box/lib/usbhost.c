// USB host library source file (usbhost.c)

#include "usbhost.h"

// USB host configuration
static usb_host_config_t usb_host_config = {
  .port = 1,
  .max_power = 500
};

// Initialize the USB host interface
void usb_host_init(void) {
  // Initialize the USB host interface on the specified port
  USBHost usb_host;
  usb_host.init(usb_host_config.port);
  
  // Set the maximum power for the USB host interface
  USBHost::setMaxPower(usb_host_config.max_power);
}

// Set the USB host configuration
void usb_host_set_config(usb_host_config_t *config) {
  // Update the USB host configuration
  usb_host_config.port = config->port;
  usb_host_config.max_power = config->max_power;
  
  // Re-initialize the USB host interface with the new configuration
  usb_host_init();
}

// Send data over US``void usb_host_send_data(uint8_t *data, uint16_t length) {
  // Send the data over USB
  USBHost::sendData(data, length);
}

// Receive data over USB
void usb_host_receive_data(uint8_t *data, uint16_t length) {
  // Receive the data over USB
  USBHost::receiveData(data, length);
}
