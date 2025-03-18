<?php

namespace App\Cat\Application\Dto;

use App\Cat\Domain\Cat;

class CatDtoMapper
{
    public function map(Cat $cat): CatDto
    {
        return new CatDto(
            id: $cat->id(),
            name: $cat->name(),
            isRunning: $cat->isRunning(),
        );
    }
}