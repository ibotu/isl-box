#ifndef USBSLAVE_H
#define USBSLAVE_H

#include <stdint.h>

// Function prototypes for USB slave functionality
void USBSlave_Init(void);
uint32_t USBSlave_ReceiveData(uint8_t *buf, uint32_t len);
void USBSlave_SendData(const uint8_t *buf, uint32_t len);

#endif /* USBSLAVE_H */