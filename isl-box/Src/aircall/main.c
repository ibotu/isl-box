void main(void)
{
int err;
float latitude;
float longitude;
char datetime[MAX_FIELD_LEN];

err = lte_lc_init_and_connect();
if (err) {
    LOG_ERR("Failed to initialize LTE modem: %d", err);
    return;
}

err = lte_lc_wait_for_network(NETWORK_TIMEOUT_MS);
if (err) {
    LOG_ERR("Failed to register with network: %d", err);
    return;
}

get_location(&latitude, &longitude);

get_datetime(datetime);

err = send_insight_card(latitude, longitude, datetime);
if (err) {
    LOG_ERR("Failed to send insight card: %d", err);
    return;
}
}