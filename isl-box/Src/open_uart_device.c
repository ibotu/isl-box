/* Open the UART device */
const struct device *uart_dev = device_get_binding(UART_DEVICE_NAME);
if (!uart_dev) {
    printk("Error opening UART device %s\n", UART_DEVICE_NAME);
    return;
}

/* Set the UART configuration */
const struct uart_config uart_cfg = {
    .baudrate = 115200,
    .parity = UART_CFG_PARITY_NONE,
    .stop_bits = UART_CFG_STOP_BITS_1,
    .data_bits = UART_CFG_DATA_BITS_8,
    .flow_ctrl = UART_CFG_FLOW_CTRL_NONE,
};
err = uart_configure(uart_dev, &uart_cfg);
if (err) {
    printk("Error configuring UART device %s: %d\n", UART_DEVICE_NAME, err);
    return;
}

/* Loop forever, receiving barcode data and sending it to the Aircall API */
while (1) {
    /* Receive barcode data over UART */
    err = uart_fifo_read(uart_dev, barcode_data, sizeof(barcode_data), UART_TIMEOUT_MS);
    if (err < 0) {
        printk("Error reading from UART device %s: %d\n", UART_DEVICE_NAME, err);
        continue;
    }
    barcode_len = err;

    /* Send barcode data to Aircall API */
    err = send_barcode_data(barcode_data, barcode_len);
    if (err) {
        printk("Error sending barcode data to Aircall API: %d\n", err);
        continue;
    }
}
