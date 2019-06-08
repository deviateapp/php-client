<?php

namespace Deviate\Clients\Usergroups;

use Deviate\Clients\Usergroups\Contracts\PermissionsClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class PermissionsClient extends AbstractClient implements PermissionsClientInterface
{
    public function sections(bool $withPermissions = true): ApiResponseInterface
    {
        return $this->call('permissions.list', [
            'include_permissions' => $withPermissions,
        ]);
    }

    public function listPermissionsInUsergroup(int $usergroupId): ApiResponseInterface
    {
        return $this->call('permissions.list.for_usergroup_id', [
            'id' => $usergroupId,
        ]);
    }
}
