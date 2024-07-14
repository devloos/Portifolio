<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Exception\PublicException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class ErrorController
{
    public function show(Throwable $exception): JsonResponse
    {
        $response = new JsonResponse();

        $response->setStatusCode(500);

        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers = new ResponseHeaderBag($exception->getHeaders());
        }

        $data = [
            'message' => 'Oops! An error occurred.',
            'success' => false
        ];

        // public exception should be used when its ok for client to see message
        if ($exception instanceof PublicException) {
            $data['message'] = $exception->getMessage();
        }

        if ($_ENV['APP_ENV'] === 'dev') {
            $data['message'] = $exception->getMessage();
            $data['file'] = $exception->getFile();
            $data['line'] = $exception->getLine();
            $data['trace'] = $exception->getTrace();
        }

        $response->setData($data);

        return $response;
    }
}
