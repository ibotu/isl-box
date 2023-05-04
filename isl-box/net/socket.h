#ifndef SOCKET_H_
#define SOCKET_H_

#include <stdbool.h>
#include <stdint.h>
#include <sys/types.h>
#include <netdb.h>

/* Socket address structure */
struct sockaddr {
    uint16_t sa_family;
    char sa_data[14];
};

/* Protocol families */
#define AF_UNSPEC 0
#define AF_INET 1
#define AF_INET6 2

/* Socket types */
#define SOCK_STREAM 1
#define SOCK_DGRAM 2

/* Address families */
#define PF_UNSPEC AF_UNSPEC
#define PF_INET AF_INET
#define PF_INET6 AF_INET6

/* Socket options */
#define SOL_SOCKET 0xFFFF
#define SO_ERROR 0x0002

/* Address information structure */
struct addrinfo {
    int ai_flags;
    int ai_family;
    int ai_socktype;
    int ai_protocol;
    socklen_t ai_addrlen;
    struct sockaddr *ai_addr;
    char *ai_canonname;
    struct addrinfo *ai_next;
};

/* Function prototypes */
int socket(int domain, int type, int protocol);
int connect(int sockfd, const struct sockaddr *addr, socklen_t addrlen);
int send(int sockfd, const void *buf, size_t len, int flags);
int close(int fd);
int getaddrinfo(const char *node, const char *service,
                const struct addrinfo *hints, struct addrinfo **res);
void freeaddrinfo(struct addrinfo *res);
const char *gai_strerror(int errcode);

#endif /* SOCKET_H_ */
