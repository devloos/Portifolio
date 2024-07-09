<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class PingController extends AbstractController
{
    #[Route('/api/ping', name: 'Ping')]
    public function ping(): JsonResponse
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
