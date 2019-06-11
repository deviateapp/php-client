<?php

namespace Deviate\Clients\Clients;

use Deviate\Clients\Contracts\ActivityCollectionsClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiPaginatedResponse;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

class ActivityCollectionsClient extends AbstractClient implements ActivityCollectionsClientInterface
{
    public function fetchCollection(int $collectionId): ApiResponseInterface
    {
        return $this->call('GET', '/activity-collections/' . $collectionId);
    }

    public function searchCollections(SearchContainerInterface $search): ApiPaginatedResponseInterface
    {
        $response = $this->call('POST', '/activity-collections/search', [
            'parameters' => serialize($search),
        ]);

        return new ApiPaginatedResponse($response->toArray());
    }

    public function createCollection(array $data): ApiResponseInterface
    {
        return $this->call('POST', '/activity-collections', $data);
    }

    public function listCollections(): ApiResponseInterface
    {
        return $this->call('GET', '/activity-collections');
    }

    public function deleteCollection(int $collectionId): ApiResponseInterface
    {
        return $this->call('DELETE', '/activity-collections/' . $collectionId);
    }

    public function updateCollection(int $collectionId, array $data): ApiResponseInterface
    {
        return $this->call('PUT', '/activity-collections/' . $collectionId, $data);
    }
}
