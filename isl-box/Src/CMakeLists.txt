cmake_minimum_required(VERSION 3.20.0)

find_package(Zephyr REQUIRED HINTS $ENV{ZEPHYR_BASE})
project(barcode_scanner_app)

target_sources(app PRIVATE src/main.c src/uart.c src/aircall.c)

target_include_directories(app PRIVATE include)

target_link_libraries(app PRIVATE httpc)

zephyr_library_sources(src/aircall.c)
