<?php

namespace Deviate\Clients\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

interface ActivityBookingsClientInterface
{
    public function book(int $userId, int $activityId, bool $force = false): ApiResponseInterface;

    public function unbook(int $userId, int $activityId, bool $force = false): ApiResponseInterface;

    public function canBook(int $userId, int $activityId, bool $force = false): ApiResponseInterface;

    public function canUnbook(int $userId, int $activityId, bool $force = false): ApiResponseInterface;

    public function listBookedUsers(int $activityId, SearchContainerInterface $search): ApiPaginatedResponseInterface;

    public function listBookedActivities(int $userId, SearchContainerInterface $search): ApiPaginatedResponseInterface;
}
