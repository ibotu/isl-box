#ifndef UART_H
#define UART_H

#include <stdint.h>

// Function prototypes

void UART_Init(void);
uint32_t UART_ReadData(uint8_t *buf, uint32_t len);
void UART_SendData(const uint8_t *buf, uint32_t len);

// Macros and definitions

#define UART_BAUDRATE 9600
#define UART_NUM_DATA_BITS 8
#define UART_NUM_STOP_BITS 1
#define UART_PARITY_NONE 0

#endif /* UART_H */
