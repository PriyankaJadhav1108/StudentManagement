<?php

namespace Ashuu\PhpTutorial;

class Example
{
    private $message;

    public function __construct($message = "Hello from Composer autoload!")
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function logMessage(\Monolog\Logger $logger)
    {
        $logger->info($this->message);
        return "Message logged successfully";
    }
}