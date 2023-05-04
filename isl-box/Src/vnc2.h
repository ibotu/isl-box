#ifndef VNC2_H
#define VNC2_H

#include <stdint.h>

// Function prototypes for USB host and device functionality

void VNC2_Init(void);
void VNC2_USBHost_Init(void);
void VNC2_USBDevice_Init(void);
uint8_t VNC2_USBHost_DeviceConnected(uint8_t port);
uint8_t VNC2_USBHost_IsHIDDevice(uint8_t port);
uint32_t VNC2_USBHost_ReadHIDReport(uint8_t port, uint8_t *buf, uint32_t len);
void VNC2_USBDevice_WriteHIDReport(uint8_t port, const uint8_t *buf, uint32_t len);
void VNC2_USBHost_DisconnectDevice(uint8_t port);

// Function prototypes for UART functionality

void UART_Init(void);
uint32_t UART_ReadData(uint8_t *buf, uint32_t len);
void UART_SendData(const uint8_t *buf, uint32_t len);

#endif /* VNC2_H */
