<?php

namespace Deviate\Clients\Users\Contracts;

use Deviate\Clients\Responses\ApiResponseInterface;

interface CreatesUsersClientInterface
{
    public function createUser(array $data): ApiResponseInterface;
}
