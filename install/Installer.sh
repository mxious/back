#!/bin/bash

# Mxious Linux Instance Installer
# (copy) Mxious 2013-2014

echo "Welcome to the Mxious Linux Instance Installer."

if [[ $UID != 0 ]]; then
    echo "This script requires sudo:"
    echo "sudo $0 $*"
    exit 1
fi

echo "-----------------------------------------------------"
echo "Let's start by asking a few essential questions."
echo "-----------------------------------------------------"
echo ""
echo "What is your mysql username? Input it now:"
read mysqluser
echo ""
echo "Where do you want the instance to be installed? Input a full path WITH TRAILING SLASH and press enter: "
read path
echo "Instance will be installed in directory $path."
echo ""
echo "Where is the Mxious SQL dump located? Full path WITHOUT final slash:"
read sqlpath
echo ""
echo "-----------------------------------------------------"
echo ""
echo "Starting install. Get some coffee or something, this will take a while."
cd $path 
echo ""
git clone https://github.com/Mxious/Mxious
echo "Cloned, installed files."
echo ""
echo "-----------------------------------------------------"
echo ""
echo "Firing up MySQL. Please wait and input your password when requested."
mysql -u $mysqluser -p -e "create database Mxious;"
mysql -u $mysqluser -p Mxious < $sqlpath/Mxious.sql
cd $path/Mxious
nano application/config/database.php.sm
mv application/config/database.php.sm application/config/database.php
mv application/config/config.php.sm application/config/config.php

echo "Finished installing. Thank you for coding with Crunch D&D!"