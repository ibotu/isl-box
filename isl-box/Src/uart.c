#include "uart.h"
#include "nrfx_uarte.h"
#include "nrfx_timer.h"
#include "nrf_gpio.h"

#define UART_RX_PIN     11
#define UART_TX_PIN     9
#define UART_BAUDRATE   NRF_UARTE_BAUDRATE_9600
#define UART_DATA_BITS  NRF_UARTE_DATA_BITS_8
#define UART_PARITY     NRF_UARTE_PARITY_EXCLUDED
#define UART_STOP_BITS  NRF_UARTE_STOP_BITS_1

#define UART_BUF_SIZE   64

static uint8_t m_rx_buf[UART_BUF_SIZE];
static uint8_t m_tx_buf[UART_BUF_SIZE];

static nrfx_uarte_t m_uarte_instance = NRFX_UARTE_INSTANCE(0);

static bool m_rx_complete = false;

static void uart_event_handler(nrfx_uarte_event_t const *p_event, void *p_context)
{
    switch(p_event->type)
    {
        case NRFX_UARTE_EVT_RX_DONE:
            m_rx_complete = true;
            break;

        default:
            break;
    }
}

void UART_Init(void)
{
    nrfx_uarte_config_t uart_config = NRFX_UARTE_DEFAULT_CONFIG;
    uart_config.baudrate = UART_BAUDRATE;
    uart_config.parity = UART_PARITY;
    uart_config.hwfc = NRF_UARTE_HWFC_DISABLED;
    uart_config.tx_pin = UART_TX_PIN;
    uart_config.rx_pin = UART_RX_PIN;

    nrfx_uarte_init(&m_uarte_instance, &uart_config, uart_event_handler, NULL);

    nrf_gpio_cfg_output(UART_TX_PIN);
    nrf_gpio_cfg_input(UART_RX_PIN, NRF_GPIO_PIN_NOPULL);

    nrfx_uarte_rx(&m_uarte_instance, m_rx_buf, UART_BUF_SIZE);
}

uint32_t UART_ReadData(uint8_t *buf, uint32_t len)
{
    uint32_t actual_len = 0;

    while(!m_rx_complete) {}

    actual_len = len < UART_BUF_SIZE ? len : UART_BUF_SIZE;
    memcpy(buf, m_rx
