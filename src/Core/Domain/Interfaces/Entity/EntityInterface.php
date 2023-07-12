<?php

namespace Core\Domain\Interfaces\Entity;

interface EntityInterface {
    public static function factory(array $data);
}
