<?php

namespace Deviate\Clients\Clients;

use Deviate\Clients\AbstractClient;
use Deviate\Clients\Contracts\UsergroupsClientInterface;
use Deviate\Clients\Responses\ApiPaginatedResponse;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainer;
use Deviate\Search\SearchContainerInterface;

class UsergroupsClient extends AbstractClient implements UsergroupsClientInterface
{
    public function fetchUsergroup(int $id): ApiResponseInterface
    {
        return $this->call('GET', '/usergroups/' . $id);
    }

    public function search(SearchContainerInterface $search): ApiPaginatedResponseInterface
    {
        $response = $this->call('POST', '/usergroups/search', [
            'parameters' => serialize($search),
        ]);

        return new ApiPaginatedResponse($response->toArray());
    }

    public function createUsergroup(array $data): ApiResponseInterface
    {
        return $this->call('POST', '/usergroups', $data);
    }

    public function updateUsergroup(int $id, array $data): ApiResponseInterface
    {
        return $this->call('PUT', '/usergroups/' . $id, $data);
    }

    public function deleteUsergroup(int $id): ApiResponseInterface
    {
        return $this->call('DELETE', '/usergroups/' . $id);
    }

    public function applyPermissions(int $usergroupId, array $permissions): ApiResponseInterface
    {
        return $this->call('POST', '/usergroups/' . $usergroupId . '/permissions', [
            'permissions' => $permissions,
        ]);
    }

    public function joinUsergroup(int $userId, int $usergroupId): ApiResponseInterface
    {
        return $this->call('POST', '/usergroups/' . $usergroupId . '/membership/' . $userId);
    }

    public function removeFromUsergroup(int $userId, int $usergroupId): ApiResponseInterface
    {
        return $this->call('DELETE', '/usergroups/' . $usergroupId . '/membership/' . $userId);
    }

    public function removeFromUsergroupByUserId(int $userId): ApiResponseInterface
    {
        return $this->call('DELETE', '/usergroups/membership', [
            'user_id' => $userId,
        ]);
    }

    public function removeUsersByUsergroupId(int $usergroupId): ApiResponseInterface
    {
        return $this->call('DELETE', '/usergroups/membership', [
            'usergroup_id' => $usergroupId,
        ]);
    }

    public function listMembers(int $usergroupId, ?SearchContainerInterface $search = null): ApiPaginatedResponseInterface
    {
        $search = $search ?? new SearchContainer;

        $response = $this->call('POST', '/usergroups/' . $usergroupId . '/membership/members', [
            'parameters' => serialize($search),
        ]);

        return new ApiPaginatedResponse($response->toArray());
    }

    public function listPermissions(bool $withPermissions = true): ApiResponseInterface
    {
        return $this->call('GET', '/permissions', [
            'include_permissions' => $withPermissions,
        ]);
    }

    public function listPermissionsInUsergroup(int $usergroupId): ApiResponseInterface
    {
        return $this->call('GET', '/usergroups/' . $usergroupId . '/permissions');
    }
}
