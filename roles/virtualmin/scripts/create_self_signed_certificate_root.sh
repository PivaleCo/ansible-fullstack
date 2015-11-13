#!/bin/bash

mkdir /root/ssl
openssl req -subj "/CN=$(hostname -a)/O=$(hostname -a)/C=GB" -new -newkey rsa:2048 -days 365 -nodes -x509 -keyout root.key -out /root/ssl/root.crt