<?php

namespace App\Cat\Ui\Http;

use App\Cat\Application\Query\CatQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Ulid;

class CatController
{
    public function __construct(private CatQuery $catQuery) {}

    #[Route('/cats/{id}', name: 'get_cat', methods: ['GET'])]
    public function getCat(string $id): Response
    {
        $ulid = Ulid::fromString($id);
        $catDto = $this->catQuery->findById($ulid);

        if (null === $catDto) {
            return new JsonResponse(['error' => 'Cat not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        return new JsonResponse($catDto);
    }
}
