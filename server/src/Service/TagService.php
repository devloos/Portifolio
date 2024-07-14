<?php

namespace App\Service;

use App\Entity\Tag;
use App\Repository\TagRepository;

class TagService
{
    public function __construct(
        private TagRepository $tagRepository
    ) {
    }

    public function getTags(array $include, array $criteria, ?array $orderBy, ?int $limit, ?int $offset): array
    {
        /** @var Tag[] $tags */
        $tags = $this->tagRepository->findBy($criteria, $orderBy, $limit, $offset);

        $data = [];

        foreach ($tags as $tag) {
            $normalizedTag = $tag->toArray();

            if (array_key_exists('experiences', $include)) {
                $normalizedTag['experiences'] = [];

                foreach ($tag->getExperiences() as $experience) {
                    $normalizedTag['experiences'][] = $experience->toArray();
                }
            }

            if (array_key_exists('projects', $include)) {
                $normalizedTag['projects'] = [];

                foreach ($tag->getProjects() as $project) {
                    $normalizedTag['projects'][] = $project->toArray();
                }
            }

            $data[] = $normalizedTag;
        }

        return $data;
    }
}
