<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DeleteUserAction extends UserAction
{
    protected function action(): Response
    {
        $id = (int) $this->resolveArg('id');

        $this->userRepository->deleteUser($id);

        return $this->respondWithData(['success' => 'User deleted']);
    }
}
