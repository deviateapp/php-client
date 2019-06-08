<?php

namespace Deviate\Clients\Usergroups\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

interface MembershipClientInterface
{
    public function join(int $userId, int $usergroupId): ApiResponseInterface;
    public function remove(int $userId, int $usergroupId): ApiResponseInterface;
    public function removeByUserId(int $userId): ApiResponseInterface;
    public function removeByUsergroupId(int $usergroupId): ApiResponseInterface;
    public function listMembers(int $usergroupId, ?SearchContainerInterface $search): ApiPaginatedResponseInterface;
}
