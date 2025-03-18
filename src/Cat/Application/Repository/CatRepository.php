<?php

namespace App\Cat\Application\Repository;

use App\Cat\Domain\Cat;
use Symfony\Component\Uid\Ulid;

interface CatRepository
{
    public function getById(Ulid $id): Cat;

    public function getByIdAnd(Ulid $id, callable $callback): void;
    public function save(Cat $cat): void;
}