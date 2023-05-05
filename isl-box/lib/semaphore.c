#include "FreeRTOS.h"
#include "task.h"
#include "semphr.h"
#include "usb.h"

// Define task priorities
#define USB_TASK_PRIORITY 1
#define SCAN_TASK_PRIORITY 2

// Define task stacks
#define USB_TASK_STACK_SIZE configMINIMAL_STACK_SIZE
#define SCAN_TASK_STACK_SIZE configMINIMAL_STACK_SIZE

// Define tasks
TaskHandle_t usb_task_handle;
TaskHandle_t scan_task_handle;

// Define semaphores
SemaphoreHandle_t barcode_sem;

// Handle incoming data on the bulk endpoint
void handle_bulk_data(uint8_t* data, uint16_t length) {
    // Copy the data into the barcode buffer
    memcpy(barcode_buffer, data, min(length, BARCODE_BUFFER_SIZE));

    // Release the barcode semaphore to signal that data is available
    xSemaphoreGive(barcode_sem);
}

// Scan task function
void scan_task(void *pvParameters) {
    // Initialize the scanner hardware
    // ...

    // Start scanning
    while(1) {
        // Scan for barcodes
        uint8_t* data;
        uint16_t length = scan_barcode(&data);

        // Send barcode data over the USB bulk endpoint
        usb_transmit(BULK_ENDPOINT_ADDRESS, data, length);

        // Wait for the barcode semaphore to be released
        if(xSemaphoreTake(barcode_sem, portMAX_DELAY) == pdTRUE) {
            // Process the barcode data
            process_barcode_data(barcode_buffer, min(length, BARCODE_BUFFER_SIZE));
        }
    }
}

int main() {
    // Create the barcode semaphore
    barcode_sem = xSemaphoreCreateBinary();

    // Start the USB task
    xTaskCreate(usb_task, "USB Task", USB_TASK_STACK_SIZE, NULL, USB_TASK_PRIORITY, &usb_task_handle);

    // Start the scan task
    xTaskCreate(scan_task, "Scan Task", SCAN_TASK_STACK_SIZE, NULL, SCAN_TASK_PRIORITY, &scan_task_handle);

    // Start the scheduler
    vTaskStartScheduler();

    // Should never get here
    return 0;
}
