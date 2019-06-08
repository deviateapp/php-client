<?php

namespace Deviate\Clients\Organisations\Contracts;

use Deviate\Clients\Responses\ApiResponseInterface;

interface ClientInterface
{
    public function fetchOrganisationById(int $id): ApiResponseInterface;
    public function createOrganisation(array $data): ApiResponseInterface;
    public function updateOrganisation(int $id, array $data): ApiResponseInterface;
    public function deleteOrganisation(int $id): ApiResponseInterface;
}
