<?php

declare(strict_types=1);

namespace Deviate\Clients\Users;

use Deviate\Clients\Users\Contracts\CreatesUsersClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class CreatesUsersClient extends AbstractClient implements CreatesUsersClientInterface
{
    public function createUser(array $data): ApiResponseInterface
    {
        return $this->call('users.create', $data);
    }
}
