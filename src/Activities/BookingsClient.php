<?php

namespace Deviate\Clients\Activities;

use Deviate\Clients\Activities\Contracts\BookingsClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class BookingsClient extends AbstractClient implements BookingsClientInterface
{
    public function book(int $userId, int $activityId, bool $force = false): ApiResponseInterface
    {
        return $this->call('activities.book', [
            'user_id'       => $userId,
            'activity_id'   => $activityId,
            'force_booking' => $force,
        ]);
    }

    public function unbook(int $userId, int $activityId, bool $force = false): ApiResponseInterface
    {
        return $this->call('activities.unbook', [
            'user_id'         => $userId,
            'activity_id'     => $activityId,
            'force_unbooking' => $force,
        ]);
    }

    public function canBook(int $userId, int $activityId, bool $force = false): ApiResponseInterface
    {
        return $this->call('activities.bookings.can_book', [
            'user_id'            => $userId,
            'activity_id'        => $activityId,
            'with_force_booking' => $force,
        ]);
    }

    public function canUnbook(int $userId, int $activityId, bool $force = false): ApiResponseInterface
    {
        return $this->call('activities.bookings.can_unbook', [
            'user_id'              => $userId,
            'activity_id'          => $activityId,
            'with_force_unbooking' => $force,
        ]);
    }
}
