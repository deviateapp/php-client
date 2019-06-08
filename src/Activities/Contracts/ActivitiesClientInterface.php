<?php

namespace Deviate\Clients\Activities\Contracts;

use Deviate\Clients\Responses\ApiResponseInterface;

interface ActivitiesClientInterface
{
    public function fetchById(int $activityId): ApiResponseInterface;
    public function create(int $collectionId, array $data): ApiResponseInterface;
    public function updateDetails(int $activityId, array $data): ApiResponseInterface;
    public function delete(int $activityId): ApiResponseInterface;
}
