<?php

namespace App\Controller\Api;

use App\Service\ExperienceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ExperienceController extends AbstractController
{
    #[Route('/api/experience/list', name: 'Experience List')]
    public function list(Request $request, ExperienceService $experienceService): JsonResponse
    {
        $response = new JsonResponse();

        $include = [];
        $criteria = [
            'visible' => true,
        ];
        $orderBy = null;
        $limit = null;
        $offset = null;

        if ($request->query->has('include')) {
            $include = $request->query->all('include');
        }

        if ($request->query->has('orderBy')) {
            $orderBy = $request->query->all('orderBy');
        }

        if ($request->query->has('limit')) {
            $limit = $request->query->getInt('limit');
        }

        if ($request->query->has('offset')) {
            $offset = $request->query->getInt('offset');
        }

        $experiences = $experienceService->getExperiences($include, $criteria, $orderBy, $limit, $offset);

        $response->setData([
            'data' => $experiences,
            'message' => 'Query was successful.',
            'success' => true,
        ]);

        return $response;
    }
}
