<?php

namespace App\Scraper\Exceptions;

use Exception;

class RateLimitException extends Exception
{
    public function __construct()
    {
        parent::__construct();
    }
}
