<?php

namespace Deviate\Clients\Usergroups;

use Deviate\Clients\Usergroups\Contracts\SearchClientInterface;
use Deviate\Clients\AbstractSearchClient;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

class SearchClient extends AbstractSearchClient implements SearchClientInterface
{
    public function search(SearchContainerInterface $search): ApiPaginatedResponseInterface
    {
        return $this->call('usergroups.search', [
            'parameters' => serialize($search),
        ]);
    }
}
