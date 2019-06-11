<?php

namespace Deviate\Clients\Clients;

use Deviate\Clients\AbstractClient;
use Deviate\Clients\Contracts\UsersClientInterface;
use Deviate\Clients\Responses\ApiPaginatedResponse;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

class UsersClient extends AbstractClient implements UsersClientInterface
{
    public function fetchUserById(int $id): ApiResponseInterface
    {
        return $this->call('GET', '/users/' . $id);
    }

    public function fetchUserByRememberToken(int $organisationId, string $token): ApiResponseInterface
    {
        return $this->call('GET', '/users/fetch-by-remember-token', [
            'organisation_id' => $organisationId,
            'token'           => $token,
        ]);
    }

    public function validatePassword(int $userId, string $password): ApiResponseInterface
    {
        return $this->call('POST', '/users/' . $userId . '/validate-password', [
            'password' => $password,
        ]);
    }

    public function search(SearchContainerInterface $search): ApiPaginatedResponseInterface
    {
        $response = $this->call('POST', '/users/search', [
            'parameters' => serialize($search),
        ]);

        return new ApiPaginatedResponse($response->toArray());
    }

    public function createUser(array $data): ApiResponseInterface
    {
        return $this->call('POST', '/users', $data);
    }

    public function updatePassword(int $userId, string $password): ApiResponseInterface
    {
        return $this->call('PUT', '/users/' . $userId . '/password', [
            'password' => $password,
        ]);
    }

    public function updateRememberToken(int $userId, ?string $token): ApiResponseInterface
    {
        return $this->call('PUT', '/users/' . $userId . '/remember-token', [
            'token' => $token,
        ]);
    }

    public function updateCoreDetails(int $userId, array $data): ApiResponseInterface
    {
        return $this->call('PUT', '/users/' . $userId, $data);
    }

    public function deactivateUser(int $userId): ApiResponseInterface
    {
        return $this->call('PUT', '/users/' . $userId . '/activation', [
            'activate' => false,
        ]);
    }

    public function reactivateUser(int $userId): ApiResponseInterface
    {
        return $this->call('PUT', '/users/' . $userId . '/activation', [
            'activate' => true,
        ]);
    }

    public function deleteUser(int $userId): ApiResponseInterface
    {
        return $this->call('DELETE', '/users/' . $userId);
    }
}
