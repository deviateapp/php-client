<?php

namespace Deviate\Clients\Organisations;

use Deviate\Clients\Organisations\Contracts\SearchClientInterface;
use Deviate\Clients\AbstractSearchClient;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

class SearchClient extends AbstractSearchClient implements SearchClientInterface
{
    public function search(SearchContainerInterface $search): ApiPaginatedResponseInterface
    {
        return $this->call('organisations.search', [
            'parameters' => serialize($search),
        ]);
    }
}
