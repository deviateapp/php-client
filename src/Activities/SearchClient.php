<?php

namespace Deviate\Clients\Activities;

use Deviate\Clients\Activities\Contracts\SearchClientInterface;
use Deviate\Clients\AbstractSearchClient;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

class SearchClient extends AbstractSearchClient implements SearchClientInterface
{
    public function searchActivities(SearchContainerInterface $search): ApiPaginatedResponseInterface
    {
        return $this->call('activities.search', [
            'parameters' => serialize($search),
        ]);
    }

    public function searchCollections(SearchContainerInterface $search): ApiPaginatedResponseInterface
    {
        return $this->call('activities.collections.search', [
            'parameters' => serialize($search),
        ]);
    }
}
