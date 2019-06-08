<?php

namespace Deviate\Clients\Activities;

use Deviate\Clients\Activities\Contracts\InvitationsClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;

class InvitationsClient extends AbstractClient implements InvitationsClientInterface
{
    public function invite(int $userId, int $activityId): ApiResponseInterface
    {
        return $this->call('activities.invite', [
            'user_id'     => $userId,
            'activity_id' => $activityId,
        ]);
    }

    public function uninvite(int $userId, int $activityId): ApiResponseInterface
    {
        return $this->call('activities.uninvite', [
            'user_id'     => $userId,
            'activity_id' => $activityId,
        ]);
    }
}
