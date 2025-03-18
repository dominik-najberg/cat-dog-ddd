<?php

namespace App\Cat\Application\Query;

use App\Cat\Application\Dto\CatDto;
use Symfony\Component\Uid\Ulid;

interface CatQuery
{
    public function findById(Ulid $id): ?CatDto;
}