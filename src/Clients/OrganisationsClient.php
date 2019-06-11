<?php

namespace Deviate\Clients\Clients;

use Deviate\Clients\AbstractClient;
use Deviate\Clients\Contracts\OrganisationsClientInterface;
use Deviate\Clients\Responses\ApiPaginatedResponse;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

class OrganisationsClient extends AbstractClient implements OrganisationsClientInterface
{
    public function fetchOrganisationById(int $id): ApiResponseInterface
    {
        return $this->call('GET', '/organisations/' . $id);
    }

    public function search(SearchContainerInterface $search): ApiPaginatedResponseInterface
    {
        $response = $this->call('POST', '/organisations/search', [
            'parameters' => serialize($search),
        ]);

        return new ApiPaginatedResponse($response->toArray());
    }

    public function createOrganisation(array $data): ApiResponseInterface
    {
        return $this->call('POST', '/organisations', $data);
    }

    public function updateOrganisation(int $id, array $data): ApiResponseInterface
    {
        return $this->call('PUT', '/organisations/' . $id, $data);
    }

    public function deleteOrganisation(int $id): ApiResponseInterface
    {
        return $this->call('DELETE', '/organisations/' . $id);
    }
}
