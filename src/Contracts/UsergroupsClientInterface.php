<?php

namespace Deviate\Clients\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

interface UsergroupsClientInterface
{
    public function fetchUsergroup(int $id): ApiResponseInterface;

    public function search(SearchContainerInterface $search): ApiPaginatedResponseInterface;

    public function createUsergroup(array $data): ApiResponseInterface;

    public function updateUsergroup(int $id, array $data): ApiResponseInterface;

    public function deleteUsergroup(int $id): ApiResponseInterface;

    public function applyPermissions(int $usergroupId, array $permissions): ApiResponseInterface;

    public function joinUsergroup(int $userId, int $usergroupId): ApiResponseInterface;

    public function removeFromUsergroup(int $userId, int $usergroupId): ApiResponseInterface;

    public function removeFromUsergroupByUserId(int $userId): ApiResponseInterface;

    public function removeUsersByUsergroupId(int $usergroupId): ApiResponseInterface;

    public function listMembers(
        int $usergroupId,
        ?SearchContainerInterface $search = null
    ): ApiPaginatedResponseInterface;

    public function listPermissions(bool $withPermissions = true): ApiResponseInterface;

    public function listPermissionsInUsergroup(int $usergroupId): ApiResponseInterface;
}
