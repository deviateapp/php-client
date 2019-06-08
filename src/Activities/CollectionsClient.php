<?php

namespace Deviate\Clients\Activities;

use Deviate\Clients\Activities\Contracts\CollectionsClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class CollectionsClient extends AbstractClient implements CollectionsClientInterface
{
    public function fetchCollection(int $collectionId): ApiResponseInterface
    {
        return $this->call('activities.collections.fetch_by_id', [
            'id' => $collectionId,
        ]);
    }

    public function createCollection(array $data): ApiResponseInterface
    {
        return $this->call('activities.collections.create', $data);
    }

    public function listCollections(): ApiResponseInterface
    {
        return $this->call('activities.collections.list');
    }

    public function deleteCollection(int $collectionId): ApiResponseInterface
    {
        return $this->call('activities.collections.delete_by_id', [
            'id' => $collectionId,
        ]);
    }

    public function updateCollection(int $collectionId, array $data): ApiResponseInterface
    {
        return $this->call('activities.collections.update', array_merge($data, [
            'id' => $collectionId,
        ]));
    }
}
