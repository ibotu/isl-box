#ifndef USBHOST_H
#define USBHOST_H

#include <stdint.h>

// Function prototypes for USB host functionality
void USBHost_Init(void);
uint8_t USBHost_FindHIDDevice(uint8_t *port);
uint32_t USBHost_WriteHIDReport(uint8_t port, const uint8_t *buf, uint32_t len);
uint32_t USBHost_ReadHIDReport(uint8_t port, uint8_t *buf, uint32_t len);

#endif /* USBHOST_H */
