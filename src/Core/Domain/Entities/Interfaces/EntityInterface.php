<?php

namespace Core\Domain\Entities\Interfaces;

interface EntityInterface {
    public static function factory(array $data);
}
