<?php

namespace Deviate\Clients\Responses;

use Illuminate\Support\Arr;

class ApiResponse extends AbstractApiResponse
{
    /** @var array|null */
    private $response;

    public function __construct(?array $response)
    {
        $this->response = $response;
    }

    public function isSuccessful(): bool
    {
        return true;
    }

    public function get(string $key, $default = null)
    {
        return Arr::get($this->response, $key, $default);
    }

    public function only(array $keys): array
    {
        return Arr::only($this->response, $keys);
    }

    public function except(array $keys): array
    {
        return Arr::except($this->response, $keys);
    }

    public function toArray()
    {
        return $this->response;
    }
}
