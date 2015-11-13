#!/bin/bash

WEBMIN_VERSION=$(cat /etc/webmin/webmin/config | grep last_version_number | cut -d "=" -f2)
sed -i "s|server=MiniServ/.*|server=MiniServ/$WEBMIN_VERSION|g" /etc/webmin/miniserv.conf