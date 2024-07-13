<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/{path}', requirements: ['path' => '.*'])]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'No route found.',
            'success' => false,
        ], 404);
    }
}
