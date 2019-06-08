<?php

namespace Deviate\Clients\Users;

use Deviate\Clients\Users\Contracts\SearchClientInterface;
use Deviate\Clients\AbstractSearchClient;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

class SearchClient extends AbstractSearchClient implements SearchClientInterface
{
    public function search(SearchContainerInterface $search): ApiPaginatedResponseInterface
    {
        return $this->call('users.search', [
            'parameters' => serialize($search),
        ]);
    }
}
