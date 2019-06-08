<?php

namespace Deviate\Clients\Activities\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

interface SearchClientInterface
{
    public function searchActivities(SearchContainerInterface $search): ApiPaginatedResponseInterface;
    public function searchCollections(SearchContainerInterface $search): ApiPaginatedResponseInterface;
}
