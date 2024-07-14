<?php

namespace App\Command;

use App\Entity\Project;
use App\Entity\Tag;
use App\Repository\ProjectRepository;
use App\Repository\TagRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'Backfill',
    description: 'This command backfills any collection.',
)]
class BackfillCommand extends Command
{

    public function __construct(
        private EntityManagerInterface $entityManagerInterface,
        private TagRepository $tagRepository,
        private ProjectRepository $projectRepository
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Starting backfill!');

        /** @var Tag[] $tags */
        $tags = $this->tagRepository->findAll();

        foreach ($tags as $tag) {
            $tag->setFeatured(true);
            $tag->setCreatedAt(new DateTimeImmutable());
            $tag->setModifiedAt(new DateTimeImmutable());

            $this->entityManagerInterface->persist($tag);
        }

        /** @var Project[] $projects */
        $projects = $this->projectRepository->findAll();

        foreach ($projects as $project) {
            $project->setVisible(true);
            $project->setCreatedAt(new DateTimeImmutable());
            $project->setModifiedAt(new DateTimeImmutable());

            $this->entityManagerInterface->persist($project);
        }

        $this->entityManagerInterface->flush();

        $output->writeln('Backfill finished!');
        return Command::SUCCESS;
    }
}
