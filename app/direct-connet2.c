#include <stdbool.h>
#include "nrf.h"
#include "nrf_drv_uart.h"
#include "nrf_delay.h"

#define UART_TX_PIN     6
#define UART_RX_PIN     8
#define UART_BAUDRATE   NRF_UART_BAUDRATE_9600
#define UART_INSTANCE   0

static char rx_buffer[256];
static uint16_t rx_index = 0;

static void uart_event_handler(nrf_drv_uart_event_t const * p_event, void * p_context) {
    if (p_event->type == NRF_DRV_UART_EVT_RX_DONE) {
        rx_buffer[rx_index++] = p_event->data.rxtx.p_data[0];
        nrf_drv_uart_rx(&uart_instance, (uint8_t *)(&rx_buffer[rx_index]), 1);
    }
}

int main(void) {
    nrf_drv_uart_t uart_instance = NRF_DRV_UART_INSTANCE(UART_INSTANCE);
    nrf_drv_uart_config_t uart_config = NRF_DRV_UART_DEFAULT_CONFIG;
    uart_config.baudrate = UART_BAUDRATE;
    uart_config.pselrxd = UART_RX_PIN;
    uart_config.pseltxd = UART_TX_PIN;

    nrf_drv_uart_init(&uart_instance, &uart_config, uart_event_handler, NULL);

    while (true) {
        nrf_delay_ms(100);

        if (rx_index > 0) {
            // Process received data here
            // ...

            // Send response
            nrf_drv_uart_tx(&uart_instance, (uint8_t *)rx_buffer, rx_index);
            rx_index = 0;
        }
    }
}
