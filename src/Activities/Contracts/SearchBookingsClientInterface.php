<?php

namespace Deviate\Clients\Activities\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

interface SearchBookingsClientInterface
{
    public function listBookedUsers(
        int $activityId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface;

    public function listBookedActivities(
        int $userId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface;
}
