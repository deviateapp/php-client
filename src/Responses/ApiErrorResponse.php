<?php

namespace Deviate\Clients\Responses;

use Deviate\Clients\Exceptions\ApiException;
use Illuminate\Support\Arr;
use Deviate\Clients\Exceptions\AbstractApiException;

class ApiErrorResponse extends AbstractApiResponse
{
    private $exception;

    public function __construct(AbstractApiException $exception)
    {
        $this->exception = $exception;
    }

    public function isSuccessful(): bool
    {
        return false;
    }

    public function rethrow(): ApiResponseInterface
    {
        throw new ApiException($this);
    }

    public function get(string $key, $default = null)
    {
        return Arr::get($this->exception->toArray(), $key, $default);
    }

    public function only(array $keys): array
    {
        return Arr::only($this->exception->toArray(), $keys);
    }

    public function except(array $keys): array
    {
        return Arr::except($this->exception->toArray(), $keys);
    }

    public function toArray()
    {
        return $this->exception->toArray();
    }
}
