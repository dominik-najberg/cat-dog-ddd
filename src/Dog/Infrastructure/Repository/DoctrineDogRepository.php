<?php

namespace App\Dog\Infrastructure\Repository;

use App\Dog\Domain\Dog;
use App\Shared\Infrastructure\Repository\AggregateRootRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Uid\Ulid;

class DoctrineDogRepository extends AggregateRootRepository
{
    /** @var EntityRepository<Dog> */
    private EntityRepository $entityRepository;

    public function __construct(public EntityManagerInterface $entityManager)
    {
        $this->entityRepository = $entityManager->getRepository(Dog::class);
    }

    public function getById(Ulid $id): Dog
    {
        return $this->entityRepository->find($id) ?? throw new \Exception('Dog not found');
    }

    public function save(Dog $dog): void
    {
        $this->entityManager->persist($dog);
        $this->entityManager->flush();
        $this->publishAggregateRootEvents($dog);
    }

}