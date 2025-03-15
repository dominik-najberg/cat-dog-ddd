<?php

namespace App\Tests\Unit\Domain\Cat;

use App\Cat\Domain\Cat;
use App\Dog\Domain\Dog;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Ulid;

class CatTest extends TestCase
{
    public function test_cat_runs_when_dog_barked(): void
    {
        $cat = Cat::create(new Ulid(), 'Kiteł');
        $dog = Dog::create(new Ulid(), 'Szczekeł');

        $dog->barkAtCat($cat->id());

        $this->assertTrue($cat->isRunning());
    }
}