<?php

namespace App\Command;

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
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Starting backfill!');

        $output->writeln('Backfill finished!');
        return Command::SUCCESS;
    }
}
