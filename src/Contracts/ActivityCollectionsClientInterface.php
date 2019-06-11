<?php

namespace Deviate\Clients\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

interface ActivityCollectionsClientInterface
{
    public function fetchCollection(int $collectionId): ApiResponseInterface;

    public function searchCollections(SearchContainerInterface $search): ApiPaginatedResponseInterface;

    public function createCollection(array $data): ApiResponseInterface;

    public function listCollections(): ApiResponseInterface;

    public function deleteCollection(int $collectionId): ApiResponseInterface;

    public function updateCollection(int $collectionId, array $data): ApiResponseInterface;
}
