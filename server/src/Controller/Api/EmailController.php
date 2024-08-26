<?php

namespace App\Controller\Api;

use App\Entity\Email;
use App\Exception\PublicException;
use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class EmailController extends AbstractController
{
    #[Route('/api/email/create', name: 'Create Email', methods: ['POST'])]
    public function create(Request $request, EmailService $emailService): JsonResponse
    {
        $response = new JsonResponse();

        $requiredFields = ['name', 'email', 'subject', 'message'];
        $body = json_decode($request->getContent(), true);

        foreach ($requiredFields as $field) {
            if (!array_key_exists($field, $body)) {
                throw new PublicException(ucfirst($field) . ' field required.');
            }
        }

        $result = $emailService->saveNewEmail(
            $body['name'],
            $body['email'],
            $body['subject'],
            $body['message']
        );

        if (!$result['success']) {
            throw new PublicException('There was an error, email not saved.');
        }

        $response->setStatusCode(201);

        $response->setData([
            'data' => $result['id'],
            'message' => 'Successfully created email.',
            'success' => true,
        ]);

        return $response;
    }
}
