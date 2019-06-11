<?php

namespace Deviate\Clients;

use Deviate\Clients\Exceptions\ApiException;
use Deviate\Clients\Responses\ApiResponse;
use Deviate\Clients\Responses\ApiResponseInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;

abstract class AbstractClient
{
    /** @var ClientInterface */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    protected function call(string $method, string $uri, array $payload = []): ApiResponseInterface
    {
        try {
            $response = $this->client->request($method, $uri, [
                RequestOptions::JSON => $payload,
            ]);

            return new ApiResponse(json_decode((string) $response->getBody(), true));
        } catch (RequestException $exception) {
            throw new ApiException(json_decode((string) $exception->getResponse()->getBody(), true));
        }
    }
}
