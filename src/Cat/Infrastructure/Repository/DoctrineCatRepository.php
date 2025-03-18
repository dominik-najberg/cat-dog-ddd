<?php

namespace App\Cat\Infrastructure\Repository;

use App\Cat\Application\Repository\CatRepository;
use App\Cat\Domain\Cat;
use App\Shared\Infrastructure\Repository\AggregateRootRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Uid\Ulid;

class DoctrineCatRepository extends AggregateRootRepository implements CatRepository
{
    /** @var EntityRepository<Cat> */
    private EntityRepository $entityRepository;

    public function __construct(public EntityManagerInterface $entityManager)
    {
        $this->entityRepository = $entityManager->getRepository(Cat::class);
    }

    public function getById(Ulid $id): Cat
    {
        return $this->entityRepository->find($id) ?? throw new \Exception('Cat not found');
    }

    public function getByIdAnd(Ulid $id, callable $callback): void
    {
        $callback($cat = $this->getById($id));
        $this->save($cat);
    }

    public function save(Cat $cat): void
    {
        $this->entityManager->persist($cat);
        $this->entityManager->flush();
        $this->publishAggregateRootEvents($cat);
    }
}