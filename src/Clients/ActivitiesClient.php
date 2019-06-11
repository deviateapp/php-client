<?php

namespace Deviate\Clients\Clients;

use Deviate\Clients\AbstractClient;
use Deviate\Clients\Contracts\ActivitiesClientInterface;
use Deviate\Clients\Responses\ApiPaginatedResponse;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

class ActivitiesClient extends AbstractClient implements ActivitiesClientInterface
{
    public function fetchById(int $activityId): ApiResponseInterface
    {
        return $this->call('GET', '/activities/' . $activityId);
    }

    public function searchActivities(SearchContainerInterface $search): ApiPaginatedResponseInterface
    {
        $response = $this->call('POST', '/activities/search', [
            'parameters' => serialize($search),
        ]);

        return new ApiPaginatedResponse($response->toArray());
    }

    public function create(int $collectionId, array $data): ApiResponseInterface
    {
        return $this->call('POST', '/activities', array_merge($data, [
            'activity_collection_id' => $collectionId,
        ]));
    }

    public function updateDetails(int $activityId, array $data): ApiResponseInterface
    {
        return $this->call('PUT', '/activities/' . $activityId, $data);
    }

    public function delete(int $activityId): ApiResponseInterface
    {
        return $this->call('DELETE', '/activities/' . $activityId);
    }
}
