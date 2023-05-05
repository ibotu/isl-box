#include <stdint.h>

// Device descriptor
const uint8_t dev_desc[] = {
    0x12,       // bLength
    0x01,       // bDescriptorType (Device)
    0x00, 0x02, // bcdUSB (USB 2.0)
    0x00,       // bDeviceClass
    0x00,       // bDeviceSubClass
    0x00,       // bDeviceProtocol
    0x08,       // bMaxPacketSize0
    0xAB, 0xCD, // idVendor
    0xEF, 0x12, // idProduct
    0x01, 0x00, // bcdDevice (1.0)
    0x01,       // iManufacturer
    0x02,       // iProduct
    0x00,       // iSerialNumber
    0x01        // bNumConfigurations
};

// Configuration descriptor
const uint8_t cfg_desc[] = {
    0x09,       // bLength
    0x02,       // bDescriptorType (Configuration)
    0x20, 0x00, // wTotalLength
    0x01,       // bNumInterfaces
    0x01,       // bConfigurationValue
    0x00,       // iConfiguration
    0xC0,       // bmAttributes (self-powered)
    0xFA,       // bMaxPower (500 mA)

    // Interface descriptor
    0x09,       // bLength
    0x04,       // bDescriptorType (Interface)
    0x00,       // bInterfaceNumber
    0x00,       // bAlternateSetting
    0x01,       // bNumEndpoints
    0x03,       // bInterfaceClass (HID)
    0x00,       // bInterfaceSubClass (not used)
    0x00,       // bInterfaceProtocol (not used)
    0x00,       // iInterface

    // HID descriptor
    0x09,       // bLength
    0x21,       // bDescriptorType (HID)
    0x10, 0x01, // bcdHID (1.10)
    0x00,       // bCountryCode
    0x01,       // bNumDescriptors
    0x22,       // bDescriptorType[0] (HID report)
    0x08, 0x00, // wDescriptorLength[0]

    // Endpoint descriptor
    0x07,       // bLength
    0x05,       // bDescriptorType (Endpoint)
    0x81,       // bEndpointAddress (IN endpoint 1)
    0x03,       // bmAttributes (interrupt)
    0x08, 0x00, // wMaxPacketSize
    0x10        // bInterval
};

// HID report descriptor
const uint8_t hid_report_desc[] = {
    0x05, 0x01, // Usage Page (Generic Desktop Controls)
    0x09, 0x02, // Usage (Mouse)
    0xA1, 0x01, // Collection (Application)
    0x09, 0x01, //   Usage (Pointer)
    0xA1, 0x00, //   Collection (Physical)
    0x05, 0x09, //     Usage Page (Button)
    0x19, 0x01, //     Usage Minimum (Button 1)
    0x29, 0x03, //     Usage Maximum (Button 3)
    0x15, 0x00, //     Logical Minimum (0)
    0x25, 0x01, //     Logical Maximum (1)
    0x95, 0x03, //     Report Count (3)
    0x75, 0x01, //     Report Size (1)
    0x81, 0x02, //     Input (Data, Variable, Absolute) - Button states
    0x95, 0x01, //     Report Count (1)
    0x75, 0x05, //     Report Size (5)
    0x81, 0x01, //     Input (Constant) - Padding bits
   
