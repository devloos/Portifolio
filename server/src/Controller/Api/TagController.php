<?php

namespace App\Controller\Api;

use App\Service\TagService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class TagController extends AbstractController
{
    #[Route('/api/tag/list', name: 'Tag List')]
    public function list(Request $request, TagService $tagService): JsonResponse
    {
        $response = new JsonResponse();

        $include = [];
        $criteria = [];
        $orderBy = null;
        $limit = null;
        $offset = null;

        if ($request->query->has('include')) {
            $include = $request->query->all('include');
        }

        if ($request->query->has('featured')) {
            array_merge($criteria, ['featured' => $request->query->getBoolean('featured')]);
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

        $data = $tagService->getTags($include, $criteria, $orderBy, $limit, $offset);

        $response->setData([
            'tags' => $data,
            'message' => 'Query was successful.',
            'success' => true,
        ]);

        return $response;
    }
}
