<?php

namespace App\Service;

use App\Entity\Email;
use App\Repository\EmailRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class EmailService
{
    public function __construct(
        private EntityManagerInterface $entityManagerInterface,
        private EmailRepository $emailRepository
    ) {
    }

    public function saveNewEmail(string $name, string $email, string $subject, string $message): array
    {
        $dbEmail = new Email();

        try {
            $dbEmail->setCreatedAt(new DateTimeImmutable());
            $dbEmail->setModifiedAt(new DateTimeImmutable());
            $dbEmail->setName($name);
            $dbEmail->setEmail($email);
            $dbEmail->setSubject($subject);
            $dbEmail->setMessage($message);

            $this->entityManagerInterface->persist($dbEmail);
            $this->entityManagerInterface->flush();
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }

        return [
            'success' => true,
            'id' => $dbEmail->getId()
        ];
    }
}
