#!/bin/sh

set -e

docker run -d -p 8092:8092 -t -i --net="host" jpizagno/bookingwebapp
