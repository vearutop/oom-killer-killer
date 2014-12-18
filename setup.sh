#!/bin/sh

mysql < ./setup.sql
cat <(crontab -l) <(echo "*/5 * * * * /usr/bin/php /var/www/oom-killer-killer/job.php /var/log/oomkk.log 2>&1") | crontab -