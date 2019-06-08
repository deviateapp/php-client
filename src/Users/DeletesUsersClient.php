<?php

declare(strict_types=1);

namespace Deviate\Clients\Users;

use Deviate\Clients\Users\Contracts\DeletesUsersClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class DeletesUsersClient extends AbstractClient implements DeletesUsersClientInterface
{
    public function deleteUser(int $userId): ApiResponseInterface
    {
        return $this->call('users.authentication.delete', [
            'id' => $userId,
        ]);
    }
}
