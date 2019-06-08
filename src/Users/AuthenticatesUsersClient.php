<?php

declare(strict_types=1);

namespace Deviate\Clients\Users;

use Deviate\Clients\Users\Contracts\AuthenticatesUsersClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class AuthenticatesUsersClient extends AbstractClient implements AuthenticatesUsersClientInterface
{
    public function validatePassword(int $userId, string $password): ApiResponseInterface
    {
        return $this->call('users.authentication.validate_password', [
            'id'       => $userId,
            'password' => $password,
        ]);
    }
}
