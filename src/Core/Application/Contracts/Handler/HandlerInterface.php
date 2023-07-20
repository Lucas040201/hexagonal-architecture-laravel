<?php

namespace Core\Application\Contracts\Handler;

use Core\Application\Contracts\Request\RequestInterface;

interface HandlerInterface
{
    public function handle(RequestInterface $request);
}
