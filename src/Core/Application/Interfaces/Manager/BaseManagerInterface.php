<?php

namespace Core\Application\Interfaces\Manager;

use Core\Application\Interfaces\DTO\DTOInterface;
use Core\Application\Interfaces\Response\ResponseInterface;

interface BaseManagerInterface
{
    public function get(int $id): ResponseInterface;
    public function create(DTOInterface $dto): ResponseInterface;
    public function update(int $id, DTOInterface $dto): ResponseInterface;
    public function delete(int $id): ResponseInterface;
}
