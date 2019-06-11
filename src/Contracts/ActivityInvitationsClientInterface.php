<?php

namespace Deviate\Clients\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

interface ActivityInvitationsClientInterface
{
    public function invite(int $userId, int $activityId): ApiResponseInterface;

    public function uninvite(int $userId, int $activityId): ApiResponseInterface;

    public function listInvitedUsers(int $activityId, SearchContainerInterface $search): ApiPaginatedResponseInterface;

    public function listInvitedActivities(int $userId, SearchContainerInterface $search): ApiPaginatedResponseInterface;
}
