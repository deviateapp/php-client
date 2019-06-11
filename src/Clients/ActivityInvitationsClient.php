<?php

namespace Deviate\Clients\Clients;

use Deviate\Clients\AbstractClient;
use Deviate\Clients\Contracts\ActivityInvitationsClientInterface;
use Deviate\Clients\Responses\ApiPaginatedResponse;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Search\SearchContainerInterface;

class ActivityInvitationsClient extends AbstractClient implements ActivityInvitationsClientInterface
{
    public function invite(int $userId, int $activityId): ApiResponseInterface
    {
        return $this->call('POST', '/activities/invitations', [
            'user_id'     => $userId,
            'activity_id' => $activityId,
        ]);
    }

    public function uninvite(int $userId, int $activityId): ApiResponseInterface
    {
        return $this->call('DELETE', '/activities/invitations', [
            'user_id' => $userId,
            'activity_id' => $activityId,
        ]);
    }

    public function listInvitedUsers(
        int $activityId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface {
        $response = $this->call('POST', '/activities/invitations/search', [
            'activity_id' => $activityId,
            'parameters'  => serialize($search),
        ]);

        return new ApiPaginatedResponse($response->toArray());
    }

    public function listInvitedActivities(
        int $userId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface {
        $response = $this->call('POST', '/activities/invitations/search', [
            'user_id'    => $userId,
            'parameters' => serialize($search),
        ]);

        return new ApiPaginatedResponse($response->toArray());
    }
}
