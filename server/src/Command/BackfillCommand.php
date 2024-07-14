<?php

namespace App\Command;

use App\Entity\Tag;
use App\Repository\TagRepository;
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
        $tags = $this->tagRepository->findBy(['logoName' => null]);

        foreach ($tags as $tag) {
            $tag->setFeatured(false);

            $this->entityManagerInterface->persist($tag);
        }

        $this->entityManagerInterface->flush();

        $output->writeln('Backfill finished!');
        return Command::SUCCESS;
    }
}
