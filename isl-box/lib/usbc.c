// Configuration descriptor for a USB device with one interface and two endpoints

const uint8_t config_descriptor[] = {
    // Configuration descriptor
    0x09,                   // bLength
    0x02,                   // bDescriptorType (Configuration)
    0x22, 0x00,             // wTotalLength (34 bytes)
    0x01,                   // bNumInterfaces
    0x01,                   // bConfigurationValue
    0x00,                   // iConfiguration
    0xA0,                   // bmAttributes
    0xFA,                   // bMaxPower (500 mA)

    // Interface descriptor
    0x09,                   // bLength
    0x04,                   // bDescriptorType (Interface)
    0x00,                   // bInterfaceNumber
    0x00,                   // bAlternateSetting
    0x02,                   // bNumEndpoints
    0xFF,                   // bInterfaceClass
    0x00,                   // bInterfaceSubClass
    0x00,                   // bInterfaceProtocol
    0x00,                   // iInterface

    // IN endpoint descriptor
    0x07,                   // bLength
    0x05,                   // bDescriptorType (Endpoint)
    0x81,                   // bEndpointAddress (IN endpoint 1)
    0x02,                   // bmAttributes (Bulk transfer)
    0x20, 0x00,             // wMaxPacketSize (32 bytes)
    0x00,                   // bInterval

    // OUT endpoint descriptor
    0x07,                   // bLength
    0x05,                   // bDescriptorType (Endpoint)
    0x01,                   // bEndpointAddress (OUT endpoint 1)
    0x02,                   // bmAttributes (Bulk transfer)
    0x20, 0x00,             // wMaxPacketSize (32 bytes)
    0x00                    // bInterval
};
