<?php

namespace App\Core\Application;

enum ErrorCodes: int {
    case NOT_FOUND = 1;
    case COULD_NOT_STORE_DATA = 2;
}