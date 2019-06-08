<?php

namespace Deviate\Clients\Activities;

use Deviate\Clients\Activities\Contracts\SearchBookingsClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Exceptions\AbstractApiException;
use Deviate\Clients\Responses\ApiPaginatedErrorResponse;
use Deviate\Clients\Responses\ApiPaginatedResponse;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

class SearchBookingsClient extends AbstractClient implements SearchBookingsClientInterface
{
    public function listBookedUsers(
        int $activityId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface {
        return $this->call('activities.bookings.search.users_on_activity', [
            'activity_id' => $activityId,
            'parameters'  => serialize($search),
        ]);
    }

    public function listBookedActivities(
        int $userId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface {
        return $this->call('activities.bookings.search.activities_for_user', [
            'user_id'    => $userId,
            'parameters' => serialize($search),
        ]);
    }

    protected function toApiResponse(?array $response): ApiResponseInterface
    {
        return new ApiPaginatedResponse($response);
    }

    protected function toApiErrorResponse(AbstractApiException $exception)
    {
        return new ApiPaginatedErrorResponse($exception);
    }
}
