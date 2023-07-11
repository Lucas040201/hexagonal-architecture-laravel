<?php

namespace Core\Domain\Entities;

use DateTime;
use Core\Domain\Entities\Interfaces\EntityInterface;

class UserEntity extends BaseEntity {
    public function __construct(
        public int|string $id = '',
        public string $name = '',
        public string $surname = '',
        public string $email = '',
        public string $password = '',
        public DateTime|string $created_at = '',
        public DateTime|string $updated_at = '',
    )
    {
        $this->validateEntity();
    }

    protected function validateEntity()
    {

    }

}
