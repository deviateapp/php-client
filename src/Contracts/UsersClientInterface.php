<?php

namespace Deviate\Clients\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

interface UsersClientInterface
{
    public function fetchUserById(int $id): ApiResponseInterface;

    public function fetchUserByRememberToken(int $organisationId, string $token): ApiResponseInterface;

    public function validatePassword(int $userId, string $password): ApiResponseInterface;

    public function search(SearchContainerInterface $search): ApiPaginatedResponseInterface;

    public function createUser(array $data): ApiResponseInterface;

    public function updatePassword(int $userId, string $password): ApiResponseInterface;

    public function updateRememberToken(int $userId, ?string $token): ApiResponseInterface;

    public function updateCoreDetails(int $userId, array $data): ApiResponseInterface;

    public function deactivateUser(int $userId): ApiResponseInterface;

    public function reactivateUser(int $userId): ApiResponseInterface;

    public function deleteUser(int $userId): ApiResponseInterface;
}
