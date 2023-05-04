#include "VNC2.h"
#include "uart.h"  // Include UART library

#define INPUT_PORT 1   // Input USB port number (for the scanner)
#define OUTPUT_PORT 2  // Output USB port number (for the POS system)

#define CMD_SCAN 0x01  // Command code for scanner input

void main(void)
{
    // Initialize the VNC2 chip and its USB host and device interfaces
    VNC2_Init();
    VNC2_USBHost_Init();
    VNC2_USBDevice_Init();

    // Initialize the UART interface
    UART_Init();

    while(1)
    {
        // Wait for a USB scanner to be connected to the input port
        while(!VNC2_USBHost_DeviceConnected(INPUT_PORT)) {}

        // Check if the connected device is a HID device
        if(VNC2_USBHost_IsHIDDevice(INPUT_PORT))
        {
            // Loop until the input device is disconnected
            while(VNC2_USBHost_DeviceConnected(INPUT_PORT))
            {
                // Read the next HID report from the input device (scanner)
                uint8_t report[64];
                uint32_t report_len = VNC2_USBHost_ReadHIDReport(INPUT_PORT, report, sizeof(report));

                // Write the HID report to the output port (POS system)
                VNC2_USBDevice_WriteHIDReport(OUTPUT_PORT, report, report_len);

                // Send the HID report data over UART for logging/debugging purposes
                UART_SendData(report, report_len);

                // Check for commands from the master device over UART
                uint8_t cmd;
                uint32_t cmd_len = UART_ReadData(&cmd, 1);
                if(cmd_len > 0 && cmd == CMD_SCAN)
                {
                    // Send the HID report data over UART to the master device
                    UART_SendData(report, report_len);
                }
            }
        }

        // Disconnect the input device and wait for the next device to be connected
        VNC2_USBHost_DisconnectDevice(INPUT_PORT);
    }
}
