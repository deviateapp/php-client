<?php

namespace Deviate\Clients\Usergroups\Contracts;

use Deviate\Clients\Responses\ApiResponseInterface;

interface PermissionsClientInterface
{
    public function sections(bool $withPermissions = true): ApiResponseInterface;
    public function listPermissionsInUsergroup(int $usergroupId): ApiResponseInterface;
}
