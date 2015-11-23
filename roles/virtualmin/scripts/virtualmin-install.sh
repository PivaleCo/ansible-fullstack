#!/bin/bash

# Get the install file
wget http://software.virtualmin.com/gpl/scripts/install.sh -O /root/install.sh
# Make the install file executable
chmod u+x /root/install.sh
# Run the installer
/bin/bash /root/install.sh -y
# Remove the install file
rm /root/install.sh
