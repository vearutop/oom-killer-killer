#!/bin/sh

ln -s /var/www/oom-killer-killer/oomkk-nginx.conf /etc/nginx/sites-enabled/oomkk-nginx.conf
invoke-rc.d nginx restart
mysql < ./setup.sql
crontab -l | { cat; cat ./crontab.txt; } | crontab -