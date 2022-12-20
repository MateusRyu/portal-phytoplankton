<?php

namespace App\Library;

use Monolog\Logger as Monolog;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;

class LoggerFactory
{
    public static function getLogger($name): Monolog
    {
        /* 
            DEBUG (100): Detailed debug information.
            INFO (200): Interesting events. Examples: User logs in, SQL logs.
            NOTICE (250): Normal but significant events.
            WARNING (300): Exceptional occurrences that are not errors. Examples: Use of deprecated APIs, poor use of an API, undesirable things that are not necessarily wrong.
            ERROR (400): Runtime errors that do not require immediate action but should typically be logged and monitored.
            CRITICAL (500): Critical conditions. Example: Application component unavailable, unexpected exception.
            ALERT (550): Action must be taken immediately. Example: Entire website down, database unavailable, etc. This should trigger the SMS alerts and wake you up.
            EMERGENCY (600): Emergency: system is unusable.
        */
        $logger = new Monolog($name);
        $config = require(APP_DIR.'/configurations/app.php');
        if($config['debug']){
            $logger->pushHandler(new BrowserConsoleHandler(Monolog::DEBUG));
            $logger->pushHandler(new StreamHandler('php://stdout', Monolog::DEBUG));
        } else {
            $logger->pushHandler(new StreamHandler(APP_DIR.'/../var/log/'.date('Y/m/d').'/Log_'.date('Y-m-d').'.txt', Monolog::NOTICE));
        }
        return $logger;
    }
}