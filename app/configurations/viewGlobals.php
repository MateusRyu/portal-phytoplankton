<?php

$config = require(__DIR__.'/app.php');

return array(
    'SITE_NAME' => $config['siteName'],
    'SITE_URL' => $config['url'],
    'TODAY' => array('YEAR'=>date("Y"), 'MONTH'=>date("m"), 'DAY'=>date("d")),
    'ON_AIR' => array('YEAR'=>'2022', 'MONTH'=>'09', 'DAY'=>'15'),
    'OFF_AIR' => array('YEAR'=>date("Y"), 'MONTH'=>date("m"), 'DAY'=>date("d")),
    // 'OFF_AIR' => array('YEAR'=>'2022', 'MONTH'=>'10', 'DAY'=>'16'),
    'DEBUG' => $config['debug']
);