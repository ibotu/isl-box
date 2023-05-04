/* Function to configure the device's security tag with a TLS certificate and private key */
int configure_tls_credentials(void)
{
    int err;
    static sec_tag_t tls_sec_tag_list[] = { CONFIG_AIRCALL_TLS_SEC_TAG };
    static const char *tls_ca_cert_file = CONFIG_AIRCALL_TLS_CA_CERT_FILE;
    static const char *tls_device_cert_file = CONFIG_AIRCALL_TLS_DEVICE_CERT_FILE;
    static const char *tls_device_key_file = CONFIG_AIRCALL_TLS_DEVICE_KEY_FILE;

    /* Set up the TLS credentials */
    err = tls_credential_add(tls_sec_tag_list, ARRAY_SIZE(tls_sec_tag_list),
                             TLS_CREDENTIAL_CA_CERTIFICATE, tls_ca_cert_file,
                             strlen(tls_ca_cert_file) + 1);
    if (err) {
        printk("Error adding CA certificate: %d\n", err);
        return err;
    }

    err = tls_credential_add(tls_sec_tag_list, ARRAY_SIZE(tls_sec_tag_list),
                             TLS_CREDENTIAL_SERVER_CERTIFICATE, tls_device_cert_file,
                             strlen(tls_device_cert_file) + 1);
    if (err) {
        printk("Error adding device certificate: %d\n", err);
        return err;
    }

    err = tls_credential_add(tls_sec_tag_list, ARRAY_SIZE(tls_sec_tag_list),
                             TLS_CREDENTIAL_PRIVATE_KEY, tls_device_key_file,
                             strlen(tls_device_key_file) + 1);
    if (err) {
        printk("Error adding private key: %d\n", err);
        return err;
    }

    return 0;
}
