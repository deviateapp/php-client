<?php

namespace Deviate\Clients;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

interface SearchClientInterface
{
    public function search(SearchContainerInterface $search): ApiPaginatedResponseInterface;
}
