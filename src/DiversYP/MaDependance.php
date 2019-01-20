<?php

namespace App\DiversYP;
use Psr\Log\LoggerInterface;

class MaDependance
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function doStuff()
    {
        $this->logger->info('I love Tony Vairelles\' hairdresser.');
    }
}