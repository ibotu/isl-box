#ifndef USB_H_
#define USB_H_

#include <stdint.h>

// Define the USB task structure
typedef struct {
    uint8_t id;
    uint32_t period;
    uint32_t last_run;
    void (*func)(void);
} usb_task_t;

// Initialize the USB task scheduler
void usb_init(void);

// Add a task to the USB task scheduler
uint8_t usb_add_task(usb_task_t task);

// Remove a task from the USB task scheduler
void usb_remove_task(uint8_t id);

// Run the USB task scheduler
void usb_run(void);
// Define the USB request structure
typedef struct {
    uint8_t bmRequestType;
    uint8_t bRequest;
    uint16_t wValue;
    uint16_t wIndex;
    uint16_t wLength;
} usb_request_t;

// Define the USB endpoint structure
typedef struct {
    uint8_t address;
    uint16_t size;
    void (*handler)(void);
} usb_endpoint_t;

// Initialize the USB hardware
void usb_init(void);

// Receive a packet from an IN endpoint
void usb_receive(uint8_t *data, uint16_t length);

// Transmit a packet on an OUT endpoint
void usb_transmit(uint8_t *data, uint16_t length);

// Handle a USB control transfer request
void usb_handle_request(usb_request_t *request);

// Register an endpoint handler function
void usb_register_endpoint(uint8_t address, uint16_t size, void (*handler)(void));

#endif /* USB_H_ */
#endif /* USB_H_ */
