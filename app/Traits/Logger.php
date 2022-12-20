<?php

namespace App\Traits;
use App\Library\LoggerFactory;

trait Logger
{
    private function debug($message)
    {
        $logger = LoggerFactory::getLogger(get_class($this));
        $logger->debug($message);
    }
    
    private function info($message)
    {
        $logger = LoggerFactory::getLogger(get_class($this));
        $logger->info($message);
    }
    
    private function notice($message)
    {
        $logger = LoggerFactory::getLogger(get_class($this));
        $logger->notice($message);
    }

    private function warning($message)
    {
        $logger = LoggerFactory::getLogger(get_class($this));
        $logger->notice($message);
    }
    
    private function error($message)
    {
        $logger = LoggerFactory::getLogger(get_class($this));
        $logger->error($message);
    }
    
    private function critical($message)
    {
        $logger = LoggerFactory::getLogger(get_class($this));
        $logger->critical($message);
    }

    private function alert($message)
    {
        $logger = LoggerFactory::getLogger(get_class($this));
        $logger->alert($message);
    }
    
    private function emergency($message)
    {
        $logger = LoggerFactory::getLogger(get_class($this));
        $logger->emergency($message);
    }
}
