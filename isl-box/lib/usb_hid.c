// USB HID library source file (usb_hid.c)

#include "usb_hid.h"

// USB HID report buffer
static usb_hid_report_t hid_report_buffer;

// Initialize the USB HID interface
void usb_hid_init(void) {
  // Initialize the USB host interface on port 1
  USBHost usb_host;
  usb_host.init();
  
  // Initialize the USB HID slave interface on port 2
  USBHID usb_hid(HID_KEYBOARD);
  usb_hid.init();
}

// Send an HID report over USB
void usb_hid_send_report(usb_hid_report_t *report) {
  // Copy the report data to the HID report buffer
  hid_report_buffer.report_id = report->report_id;
  memcpy(hid_report_buffer.data, report->data, MAX_REPORT_LENGTH);
  
  // Send the HID report over USB
  USBHost::sendReport(hid_report_buffer.report_id, hid_report_buffer.data, MAX_REPORT_LENGTH);
}

// Receive an HID report over USB
void usb_hid_receive_report(usb_hid_report_t *report) {
  // Wait for an HID report to be received over USB
  while(!USBHID::isReceiveComplete()) {
    // Wait for receive to complete
  }
  
  // Get the received HID report
  uint8_t report_id = USBHID::getReportID();
  uint8_t *report_data = USBHID::getReportData();
  
  // Copy the HID report to the report buffer
  report->report_id = report_id;
  memcpy(report->data, report_data, MAX_REPORT_LENGTH);
  
  // Start receiving the next HID report over USB
  USBHID::startReceive(report_data, MAX_REPORT_LENGTH);
}
