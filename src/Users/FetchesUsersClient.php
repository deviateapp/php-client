<?php

declare(strict_types=1);

namespace Deviate\Clients\Users;

use Deviate\Clients\Users\Contracts\FetchesUsersClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class FetchesUsersClient extends AbstractClient implements FetchesUsersClientInterface
{
    public function fetchUserById(int $id): ApiResponseInterface
    {
        return $this->call('users.fetch.by_id', [
            'id' => $id,
        ]);
    }

    public function fetchUserByRememberToken(int $organisationId, string $token): ApiResponseInterface
    {
        return $this->call('users.fetch.by_remember_token', [
            'organisation_id' => $organisationId,
            'remember_token'  => $token,
        ]);
    }
}
