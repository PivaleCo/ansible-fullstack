#!/bin/bash

# Disable all virtualmin features (awstats, webalizer, mailman) but not htpasswd
sed -i "s|^plugins=.*|plugins=virtualmin-htpasswd|g" /etc/webmin/virtual-server/config