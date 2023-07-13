<?php

namespace Core\Domain\DomainInterfaces\Entity;

interface EntityInterface {
    public static function factory(array $data);
}
