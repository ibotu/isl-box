/* Function to initialize the LTE modem */
int init_lte_modem(void)
{
    int err;

    /* Power on the LTE modem */
    err = lte_lc_power_on();
    if (err) {
        printk("Error powering on LTE modem: %d\n", err);
        return err;
    }

    /* Wait for the LTE network registration to complete */
    err = lte_lc_wait_conn(CONFIG_LTE_NETWORK_TIMEOUT_MS);
    if (err) {
        printk("Error connecting to LTE network: %d\n", err);
        return err;
    }

    /* Print the current LTE network operator */
    char operator_str[32];
    err = lte_lc_get_current_operator(operator_str, sizeof(operator_str), NULL);
    if (err) {
        printk("Error getting current operator: %d\n", err);
    } else {
        printk("Current operator: %s\n", operator_str);
    }

    /* Print the current RSSI */
    int rssi;
    err = lte_lc_get_rssi(&rssi);
    if (err) {
        printk("Error getting RSSI: %d\n", err);
    } else {
        printk("RSSI: %d dBm\n", rssi);
    }

    return 0;
}
