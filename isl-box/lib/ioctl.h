#include <fcntl.h>      // for open()
#include <sys/ioctl.h>  // for ioctl()
#include <unistd.h>     // for close()

int main() {
    int fd = open("/dev/my_device", O_RDWR); // open the device file
    if (fd < 0) {
        // handle error
    }

    // perform an ioctl operation
    int value = 123;
    if (ioctl(fd, MY_IOCTL_CMD, &value) < 0) {
        // handle error
    }

    close(fd); // close the device file
    return 0;
}
