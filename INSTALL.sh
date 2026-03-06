#!/bin/bash

: '
# INSTALL WITH COMMAND:

cd /usr/local/cpanel/base/frontend/jupiter/ && git clone https://github.com/stefanpejcic/imapsync-cpanel-plugin && bash imapsync-cpanel-plugin/INSTALL.sh
'

if [[ $EUID -ne 0 ]]; then 
   echo "✘ Error: This script must be run as root."
   exit 1
fi

echo "--- Step 1: Checking for imapsync binary ---"

if ! command -v imapsync &> /dev/null; then
    echo "imapsync not found. Installing..."
    if command -v dnf &> /dev/null; then
        dnf install -y epel-release && dnf install -y imapsync
    elif command -v yum &> /dev/null; then
        yum install -y epel-release && yum install -y imapsync
    elif command -v apt-get &> /dev/null; then
        apt-get update && apt-get install -y imapsync
    else
        echo "✘ Error: Package manager not supported. Install imapsync manually."
        exit 1
    fi
else
    echo "✔ imapsync is already installed."
fi

echo "--- Step 2: Registering Plugin with cPanel ---"

if [ -f "/usr/local/cpanel/base/frontend/jupiter/imapsync-cpanel-plugin/imap.tar.gz" ]; then
    /usr/local/cpanel/scripts/install_plugin "/usr/local/cpanel/base/frontend/jupiter/imapsync-cpanel-plugin/imap.tar.gz" --theme jupiter
    echo "✔ Installation complete!"
else
    echo "✘ Error: imap.tar.gz not found in /usr/local/cpanel/base/frontend/jupiter/imapsync-cpanel-plugin/"
    exit 1
fi
