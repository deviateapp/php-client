<?php

namespace Deviate\Clients\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

interface ActivitiesClientInterface
{
    public function fetchById(int $activityId): ApiResponseInterface;

    public function searchActivities(SearchContainerInterface $search): ApiPaginatedResponseInterface;

    public function create(int $collectionId, array $data): ApiResponseInterface;

    public function updateDetails(int $activityId, array $data): ApiResponseInterface;

    public function delete(int $activityId): ApiResponseInterface;
}
