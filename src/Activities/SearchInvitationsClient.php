<?php

namespace Deviate\Clients\Activities;

use Deviate\Clients\Activities\Contracts\SearchInvitationsClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Exceptions\AbstractApiException;
use Deviate\Clients\Responses\ApiPaginatedErrorResponse;
use Deviate\Clients\Responses\ApiPaginatedResponse;
use Deviate\Clients\Responses\ApiPaginatedResponseInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Deviate\Shared\Search\SearchContainerInterface;

class SearchInvitationsClient extends AbstractClient implements SearchInvitationsClientInterface
{
    public function listInvitedUsers(
        int $activityId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface {
        return $this->call('activities.invitations.search.invited', [
            'activity_id' => $activityId,
            'parameters'  => serialize($search),
        ]);
    }

    public function listInvitedActivities(
        int $userId,
        SearchContainerInterface $search
    ): ApiPaginatedResponseInterface {
        return $this->call('activities.invitations.search.invitations_for_user', [
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
