<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class SaveUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        if (empty($data['name']) || empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new HttpBadRequestException($this->request, 'Invalid input');
        }

        $this->userRepository->createUser($data);

        $this->logger->info("User with email {$data['email']} was created.");

        return $this->respondWithData(['success' => 'User created']);
    }
}
