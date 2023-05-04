#ifndef NRF9160_H
#define NRF9160_H

#include <stdint.h>
#include <stdbool.h>

// Function prototypes for nRF9160 functionality

void nRF9160_Init(void);
void nRF9160_SendBarcodeData(const uint8_t *buf, uint32_t len);

#endif /* NRF9160_H */

#ifndef UART_H
#define UART_H

#include <stdbool.h>
#include <stdint.h>

// Function prototypes for UART interface

void UART_Init(void);
uint32_t UART_ReadData(uint8_t *buf, uint32_t len);
void UART_SendData(const uint8_t *buf, uint32_t len);

#endif /* UART_H */
#ifndef NRF9160_H
#define NRF9160_H

#include <string.h>

// Define the UART buffer size
#define UART_BUFFER_SIZE 64

// Define the Aircall API endpoint and authentication credentials
#define API_ENDPOINT "https://api.aircall.io/v1"
#define API_KEY "YOUR_API_KEY"
#define API_SECRET "YOUR_API_SECRET"

// Function prototypes for nRF9160 functionality

void nRF9160_Init(void);
void nRF9160_SendBarcodeData(const uint8_t *buf, uint32_t len);

#endif /* NRF9160_H */
