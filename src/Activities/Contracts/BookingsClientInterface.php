<?php

namespace Deviate\Clients\Activities\Contracts;

use Deviate\Clients\Responses\ApiResponseInterface;

interface BookingsClientInterface
{
    public function book(int $userId, int $activityId, bool $force = false): ApiResponseInterface;
    public function unbook(int $userId, int $activityId, bool $force = false): ApiResponseInterface;
    public function canBook(int $userId, int $activityId, bool $force = false): ApiResponseInterface;
    public function canUnbook(int $userId, int $activityId, bool $force = false): ApiResponseInterface;
}
