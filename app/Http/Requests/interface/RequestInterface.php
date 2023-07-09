<?php
namespace App\Http\Requests\interface;

use App\Core\Application\Interfaces\DTO\DTOInterface;

interface RequestInterface {
    public function createDTO(): DTOInterface;
}
