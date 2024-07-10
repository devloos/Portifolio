<?php

namespace App\Controller\Api;

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
    public function pingDatabase(): JsonResponse
    {
        return $this->json([
            'message' => 'Pong from database.',
            'success' => true,
        ]);
    }
}
