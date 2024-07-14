<?php

namespace App\Service;

use App\Repository\ProjectRepository;

class ProjectService
{
    public function __construct(
        private ProjectRepository $projectRepository
    ) {
    }

    public function getProjects(array $include, array $criteria, ?array $orderBy, ?int $limit, ?int $offset): array
    {
        /** @var Project[] $projects */
        $projects = $this->projectRepository->findBy($criteria, $orderBy, $limit, $offset);

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

        return $data;
    }
}
