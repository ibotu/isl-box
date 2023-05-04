#include "VNC2.h"

#define REPORT_HEADER 0x55 // Define the report header that we want to recognize

void main(void)
{
    // Initialize the VNC2 chip and its USB host interface
    VNC2_Init();
    VNC2_USBHost_Init();

    while(1)
    {
        // Wait for a USB device to be connected
        while(!VNC2_USBHost_DeviceConnected()) {}

        // Check if the connected device is a HID device
        if(VNC2_USBHost_IsHIDDevice())
        {
            // Loop until we receive a valid HID report with the desired header
            while(1)
            {
                // Read the next HID report from the device
                uint8_t report[64];
                uint32_t report_len = VNC2_USBHost_ReadHIDReport(report, sizeof(report));

                // Check if the report is valid and has the desired header
                if(report_len > 0 && report[0] == REPORT_HEADER)
                {
                    // Do something with the report data
                    // ...

                    // Break out of the loop and wait for the next report
                    break;
                }
            }
        }

        // Disconnect the USB device and wait for the next device to be connected
        VNC2_USBHost_DisconnectDevice();
    }
}