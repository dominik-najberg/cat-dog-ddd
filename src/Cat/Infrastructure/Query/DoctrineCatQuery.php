<?php

namespace App\Cat\Infrastructure\Query;

use App\Cat\Application\Dto\CatDto;
use App\Cat\Application\Dto\CatDtoMapper;
use App\Cat\Application\Query\CatQuery;
use App\Cat\Domain\Cat;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Uid\Ulid;

class DoctrineCatQuery implements CatQuery
{
    /** @var EntityRepository<Cat> */
    private EntityRepository $entityRepository;

    public function __construct(
        private CatDtoMapper $mapper,
        EntityManagerInterface $entityManager,
    ) {
        $this->entityRepository = $entityManager->getRepository(Cat::class);
    }

    public function findById(Ulid $id): ?CatDto
    {
        $entity = $this->entityRepository->find($id);

        return $entity ? $this->mapper->map($entity) : null;
    }
}