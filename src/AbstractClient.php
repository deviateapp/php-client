<?php

namespace Deviate\Clients;

use Deviate\Clients\Exceptions\AbstractApiException;
use Deviate\Clients\Responses\ApiResponse;
use Deviate\Clients\Responses\ApiResponseInterface;
use Illuminate\Contracts\Events\Dispatcher;

abstract class AbstractClient
{
    /** @var Dispatcher */
    private $events;

    public function __construct(Dispatcher $events)
    {
        $this->events = $events;
    }

    protected function call(string $event, array $payload = []): ApiResponseInterface
    {
        try {
            $response = $this->events->dispatch($event, [
                'payload' => $payload,
            ], true);

            return $this->toApiResponse($response);
        } catch (AbstractApiException $exception) {
            return $this->toApiErrorResponse($exception);
        }
    }

    protected function toApiResponse(?array $response): ApiResponseInterface
    {
        return new ApiResponse($response);
    }

    protected function toApiErrorResponse(AbstractApiException $exception)
    {
        return new Responses\ApiErrorResponse($exception);
    }
}
