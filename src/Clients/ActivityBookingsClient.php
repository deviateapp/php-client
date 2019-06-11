<?php

namespace Deviate\Clients\Clients;

use Deviate\Clients\AbstractClient;
use Deviate\Clients\Contracts\ActivityBookingsClientInterface;
use Deviate\Clients\Responses\ApiPaginatedResponse;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;
use function serialize;

class ActivityBookingsClient extends AbstractClient implements ActivityBookingsClientInterface
{
    public function book(int $userId, int $activityId, bool $force = false): ApiResponseInterface
    {
        return $this->call('POST', '/activities/bookings', [
            'user_id' => $userId,
            'activity_id' => $activityId,
            'force_booking' => $force,
        ]);
    }

    public function unbook(int $userId, int $activityId, bool $force = false): ApiResponseInterface
    {
        return $this->call('DELETE', '/activities/bookings', [
            'user_id' => $userId,
            'activity_id' => $activityId,
            'force_unbooking' => $force,
        ]);
    }

    public function canBook(int $userId, int $activityId, bool $force = false): ApiResponseInterface
    {
        return $this->call('GET', '/activities/bookings/can-book', [
            'user_id'            => $userId,
            'activity_id'        => $activityId,
            'with_force_booking' => $force,
        ]);
    }

    public function canUnbook(int $userId, int $activityId, bool $force = false): ApiResponseInterface
    {
        return $this->call('GET', '/activities/bookings/can-unbook', [
            'user_id'              => $userId,
            'activity_id'          => $activityId,
            'with_force_unbooking' => $force,
        ]);
    }

    public function listBookedUsers(
        int $activityId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface {
        $response = $this->call('POST', '/activities/bookings/search', [
            'activity_id' => $activityId,
            'parameters' => serialize($search),
        ]);

        return new ApiPaginatedResponse($response->toArray());
    }

    public function listBookedActivities(
        int $userId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface {
        $response = $this->call('POST', '/activities/bookings/search', [
            'user_id' => $userId,
            'parameters' => serialize($search),
        ]);

        return new ApiPaginatedResponse($response->toArray());
    }
}
