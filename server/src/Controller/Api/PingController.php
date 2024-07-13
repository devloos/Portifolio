<?php

namespace App\Controller\Api;

use App\Entity\Ping;
use App\Repository\PingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class PingController extends AbstractController
{
    #[Route('/api/ping', name: 'Ping')]
    public function ping(Request $request): JsonResponse
    {
        return $this->json([
            'message' => 'Pong',
            'success' => true,
        ]);
    }

    #[Route('/api/ping/database', name: 'Ping Database')]
    public function pingDatabase(PingRepository $pingRepository): JsonResponse
    {
        $ping = $pingRepository->find(1);

        if (!$ping instanceof Ping) {
            return $this->json([
                'message' => 'Pong not found.',
                'success' => false,
            ], 404);
        }

        return $this->json([
            'message' => $ping->getMessage(),
            'success' => true,
        ]);
    }

    // #[Route('/api/ping/insert', name: 'Ping Insert')]
    // public function pingInsert(EntityManagerInterface $entityManager): JsonResponse
    // {
    //     $ping = new Ping();
    //     $ping->setMessage('Pong from database!');

    //     // tell Doctrine you want to (eventually) save the Product (no queries yet)
    //     $entityManager->persist($ping);

    //     // actually executes the queries (i.e. the INSERT query)
    //     $entityManager->flush();

    //     return $this->json([
    //         'id' => $ping->getId(),
    //         'message' => 'Saved new ping.',
    //         'success' => true,
    //     ]);
    // }
}
