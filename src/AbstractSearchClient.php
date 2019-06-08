<?php

namespace Deviate\Clients;

abstract class AbstractSearchClient extends AbstractClient
{
    protected function toApiResponse(?array $response): Responses\ApiResponseInterface
    {
        return new Responses\ApiPaginatedResponse($response);
    }
}
