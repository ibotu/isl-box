#ifndef VOS_H_
#define VOS_H_

#include "stdint.h"

// Define the VOS task structure
typedef struct {
    uint8_t id;
    uint32_t period;
    uint32_t last_run;
    void (*func)(void);
} vos_task_t;

// Initialize the VOS task scheduler
void vos_init(void);

// Add a task to the VOS task scheduler
uint8_t vos_add_task(vos_task_t task);

// Remove a task from the VOS task scheduler
void vos_remove_task(uint8_t id);

// Run the VOS task scheduler
void vos_run(void);

#endif /* VOS_H_ */
