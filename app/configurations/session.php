<?php

$minutes = 60; // 60 seconds
$hour = 60 * $minutes;
$day = 24 * $hour;
$year = 365 * $day;

return array(
    'lifeTime' => 8 * $hour,
    'remember' => 3 * $year, 
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict',
);
