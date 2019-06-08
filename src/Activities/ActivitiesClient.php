<?php

namespace Deviate\Clients\Activities;

use Deviate\Clients\Activities\Contracts\ActivitiesClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class ActivitiesClient extends AbstractClient implements ActivitiesClientInterface
{
    public function fetchById(int $activityId): ApiResponseInterface
    {
        return $this->call('activities.fetch_by_id', [
            'id' => $activityId,
        ]);
    }

    public function create(int $collectionId, array $data): ApiResponseInterface
    {
        return $this->call('activities.create', array_merge($data, [
            'activity_collection_id' => $collectionId,
        ]));
    }

    public function updateDetails(int $activityId, array $data): ApiResponseInterface
    {
        return $this->call('activities.update.by_id', array_merge($data, [
            'id' => $activityId,
        ]));
    }

    public function delete(int $activityId): ApiResponseInterface
    {
        return $this->call('activities.delete.by_id', [
            'id' => $activityId,
        ]);
    }
}
