<?php

namespace App\Controller\Api;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ProjectController extends AbstractController
{
    #[Route('/api/project/list', name: 'Project List')]
    public function list(Request $request, ProjectRepository $projectRepository): JsonResponse
    {
        $response = new JsonResponse();

        $criteria = [];
        $orderBy = null;
        $limit = null;
        $offset = null;

        if ($request->query->has('criteria')) {
            $criteria = $request->query->all('criteria');
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

        /** @var Project[] $projects */
        $projects = $projectRepository->findBy($criteria, $orderBy, $limit, $offset);

        $include = [];

        if ($request->query->has('include')) {
            $include = $request->query->all('include');
        }

        $data = [];

        foreach ($projects as $project) {
            $normalizedProject = $project->toArray();

            if (array_key_exists('tags', $include)) {
                $normalizedProject['tags'] = [];

                foreach ($project->getTags() as $tag) {
                    $normalizedProject['tags'][] = $tag->toArray();
                }
            }

            $data[] = $normalizedProject;
        }

        $response->setData([
            'projects' => $data,
            'message' => 'Query was successful.',
            'success' => true,
        ]);

        return $response;
    }
}
