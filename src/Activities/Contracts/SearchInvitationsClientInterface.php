<?php

namespace Deviate\Clients\Activities\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

interface SearchInvitationsClientInterface
{
    public function listInvitedUsers(
        int $activityId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface;

    public function listInvitedActivities(
        int $userId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface;
}
