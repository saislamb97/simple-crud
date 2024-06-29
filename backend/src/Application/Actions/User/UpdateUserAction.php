<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;

class UpdateUserAction extends UserAction
{
    protected function action(): Response
    {
        $id = (int) $this->resolveArg('id');
        $data = $this->request->getParsedBody();
        if (empty($data['name']) || empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new HttpBadRequestException($this->request, 'Invalid input');
        }

        $this->userRepository->updateUser($id, $data);

        return $this->respondWithData(['success' => 'User updated']);
    }
}
