<?php

namespace App\Core\Application;

use App\Core\Application\ErrorCodes;

abstract class Response {
    public function __construct(
        public bool $success,
        public string $message,
        public ErrorCodes $errorCode,
    ){}

}