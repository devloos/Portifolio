<?php

namespace App\Service;

use App\Entity\Experience;
use App\Repository\ExperienceRepository;

class ExperienceService
{
    public function __construct(
        private ExperienceRepository $experienceRepository
    ) {
    }

    public function getExperiences(array $include, array $criteria, ?array $orderBy, ?int $limit, ?int $offset): array
    {
        /** @var Experience[] $experiences */
        $experiences = $this->experienceRepository->findBy($criteria, $orderBy, $limit, $offset);

        $data = [];

        foreach ($experiences as $experience) {
            $normalizedExperience = $experience->toArray();

            if (array_key_exists('tags', $include)) {
                $normalizedExperience['tags'] = [];

                foreach ($experience->getTags() as $tag) {
                    $normalizedExperience['tags'][] = $tag->toArray();
                }
            }

            $data[] = $normalizedExperience;
        }

        return $data;
    }
}
