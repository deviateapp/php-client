<?php

namespace Deviate\Clients\Usergroups;

use Deviate\Clients\Usergroups\Contracts\UsergroupsClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class UsergroupsClient extends AbstractClient implements UsergroupsClientInterface
{
    public function fetchUsergroup(int $id): ApiResponseInterface
    {
        return $this->call('usergroups.fetch.by_id', [
            'id' => $id,
        ]);
    }

    public function createUsergroup(array $data): ApiResponseInterface
    {
        return $this->call('usergroups.create', $data);
    }

    public function updateUsergroup(int $id, array $data): ApiResponseInterface
    {
        return $this->call('usergroups.update', array_merge($data, [
            'id' => $id,
        ]));
    }

    public function deleteUsergroup(int $id): ApiResponseInterface
    {
        return $this->call('usergroups.delete', [
            'id' => $id,
        ]);
    }

    public function applyPermissions(int $usergroupId, array $permissions): ApiResponseInterface
    {
        return $this->call('usergroups.set_permissions', [
            'id'          => $usergroupId,
            'permissions' => $permissions,
        ]);
    }
}
