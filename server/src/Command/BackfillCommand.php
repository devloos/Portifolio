<?php

namespace App\Command;

use App\Entity\Project;
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
    public const array PROJECTS = [
        [
            "file" => [
                "type" => "video",
                "src" => "/tplos/portfolio/projects/el-andariego-1704676212150.mp4"
            ],
            "title" => "El Andariego",
            "desc" => "The use of Vue's Virtual DOM optimized rendering performance, reducing unnecessary updates. I also employed Vue's Pinia for structured state management and Vue Router for client-side routing, facilitating seamless navigation in your single-page application. MongoDB's flexible document-oriented data model provided efficient storage for dynamic content like menu items and customer orders.",
            "tags" => [
                [
                    "text" => "Javascript",
                    "logo" => "javascript"
                ],
                [
                    "text" => "Vue js",
                    "logo" => "vuedotjs"
                ],
                [
                    "text" => "Laravel",
                    "logo" => "laravel"
                ],
                [
                    "text" => "MongoDB",
                    "logo" => "mongodb"
                ],
                [
                    "text" => "Tailwind CSS",
                    "logo" => "tailwindcss"
                ]
            ],
            "site" => "https://www.elandariegotruck.com/",
            "source" => "https://github.com/devloos/El-Andariego",
            "featured" => true
        ],
        [
            "file" => [
                "type" => "video",
                "src" => "/tplos/portfolio/projects/street-fighter.mp4"
            ],
            "title" => "Street Fighter",
            "desc" => "Street Fighter themed Tic Tac Toe game in Java featured multithreading to handle concurrent gameplay actions and networking through sockets for multiplayer functionality. Agile project management practices, including version control and regular team meetings, ensured efficient development and collaboration.",
            "tags" => [
                [
                    "text" => "Java",
                    "logo" => null
                ],
                [
                    "text" => "JavaFX",
                    "logo" => null
                ],
                [
                    "text" => "Maven",
                    "logo" => "apachemaven"
                ]
            ],
            "source" => "https://github.com/devloos/Street-Fighter",
            "site" => null,
            "featured" => true
        ],
        [
            "file" => [
                "type" => "video",
                "src" => "/tplos/portfolio/projects/graphics-modeler.mp4"
            ],
            "title" => "Graphics Modeler",
            "desc" => "This project implements a C++ library for 2D graphical objects, emphasizing core programming concepts such as inheritance, aggregation, polymorphism, and more. It utilizes Qt's GUI capabilities, featuring a user-friendly interface for manipulating object properties and adheres to agile development methodologies, including Scrum practices and UML diagrams for design and implementation planning.",
            "tags" => [
                [
                    "text" => "C++",
                    "logo" => "cplusplus"
                ],
                [
                    "text" => "QT",
                    "logo" => "qt"
                ],
                [
                    "text" => "Linux",
                    "logo" => "linux"
                ],
                [
                    "text" => "CMake",
                    "logo" => "cmake"
                ]
            ],
            "source" => "https://github.com/devloos/Graphics-Modeler",
            "site" => null,
            "featured" => true
        ],
        [
            "file" => [
                "type" => "video",
                "src" => "/tplos/portfolio/projects/sales-system.mp4"
            ],
            "title" => "Sales System",
            "desc" => "Gained proficiency in manual memory allocation, preventing memory leaks through proper memory deallocation. I also learned about the benefits of smart pointers, which facilitated ownership management and resource release through the RAII principle. Additionally, move semantics enhanced resource optimization and efficient data transfer, while the STL provided essential containers and algorithms for managing and processing data.",
            "tags" => [
                [
                    "text" => "C++",
                    "logo" => "cplusplus"
                ],
                [
                    "text" => "Linux",
                    "logo" => "linux"
                ],
                [
                    "text" => "CMake",
                    "logo" => "cmake"
                ]
            ],
            "source" => "https://github.com/devloos/Sales-System",
            "site" => null,
            "featured" => true
        ]
    ];


    public function __construct(
        private EntityManagerInterface $entityManagerInterface,
        private TagRepository $tagRepository
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Starting backfill!');

        foreach (self::PROJECTS as $project) {
            $dbProject = new Project();

            $dbProject->setTitle($project['title']);
            $dbProject->setDescription($project['desc']);
            $dbProject->setFeatured($project['featured']);
            $dbProject->setSite($project['site']);
            $dbProject->setSource($project['source']);
            $dbProject->setFile($project['file']);

            foreach ($project['tags'] as $tag) {
                $dbTag = $this->tagRepository->findOneBy(['title' => $tag['text']]);

                if (!$dbTag instanceof Tag) {
                    return Command::FAILURE;
                }

                $dbProject->addTag($dbTag);
            }

            $this->entityManagerInterface->persist($dbProject);
        }

        $this->entityManagerInterface->flush();

        $output->writeln('Backfill finished!');
        return Command::SUCCESS;
    }
}
