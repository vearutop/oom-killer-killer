#!/usr/bin/php
<?php

$host = 'http://oomkk.phph.tk/';

if ('ok' !== @file_get_contents($host . 'check.txt')) {
    system('invoke-rc.d nginx restart');
}

if ('ok' !== @file_get_contents($host . 'job.php')) {
    system('invoke-rc.d php5-fpm restart');
}


$mysqli = new mysqli('localhost', 'oom', 'oom', 'oom');
if ($mysqli->connect_error) {
    echo ('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);

    if (2002 == $mysqli->connect_errno) {
        system('invoke-rc.d mysql restart');
    }
}