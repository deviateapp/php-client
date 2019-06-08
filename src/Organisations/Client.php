<?php

declare(strict_types=1);

namespace Deviate\Clients\Organisations;

use Deviate\Clients\Organisations\Contracts\ClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class Client extends AbstractClient implements ClientInterface
{
    public function fetchOrganisationById(int $id): ApiResponseInterface
    {
        return $this->call('organisations.fetch.by_id', [
            'id' => $id,
        ]);
    }

    public function createOrganisation(array $data): ApiResponseInterface
    {
        return $this->call('organisations.create', $data);
    }

    public function updateOrganisation(int $id, array $data): ApiResponseInterface
    {
        return $this->call('organisations.update', array_merge([
            'id' => $id,
        ], $data));
    }

    public function deleteOrganisation(int $id): ApiResponseInterface
    {
        return $this->call('organisations.delete', [
            'id' => $id,
        ]);
    }
}
