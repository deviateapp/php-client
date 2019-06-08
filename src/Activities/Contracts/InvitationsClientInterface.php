<?php

namespace Deviate\Clients\Activities\Contracts;

use Deviate\Clients\Responses\ApiResponseInterface;

interface InvitationsClientInterface
{
    public function invite(int $userId, int $activityId): ApiResponseInterface;
    public function uninvite(int $userId, int $activityId): ApiResponseInterface;
}
