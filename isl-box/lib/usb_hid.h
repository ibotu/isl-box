// USB HID library header file (usb_hid.h)

#ifndef USB_HID_H_
#define USB_HID_H_

#include "VNC2.h"

// Define the USB HID report structure
typedef struct {
  uint8_t report_id;
  uint8_t data[MAX_REPORT_LENGTH];
} usb_hid_report_t;

// Initialize the USB HID interface
void usb_hid_init(void);

// Send an HID report over USB
void usb_hid_send_report(usb_hid_report_t *report);

// Receive an HID report over USB
void usb_hid_receive_report(usb_hid_report_t *report);

#endif /* USB_HID_H_ */
