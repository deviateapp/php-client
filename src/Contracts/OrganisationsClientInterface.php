<?php

namespace Deviate\Clients\Contracts;

use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

interface OrganisationsClientInterface
{
    public function fetchOrganisationById(int $id): ApiResponseInterface;
    public function search(SearchContainerInterface $search): ApiPaginatedResponseInterface;
    public function createOrganisation(array $data): ApiResponseInterface;
    public function updateOrganisation(int $id, array $data): ApiResponseInterface;
    public function deleteOrganisation(int $id): ApiResponseInterface;
}
