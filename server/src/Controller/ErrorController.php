<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ErrorController extends AbstractController
{
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'No route found.',
            'success' => false,
        ], 404);
    }
}
