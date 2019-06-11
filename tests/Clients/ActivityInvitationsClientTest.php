<?php

namespace Deviate\Clients\Tests\Clients;

use Deviate\Clients\Clients\ActivityInvitationsClient;
use Deviate\Clients\Tests\TestCase;
use Deviate\Search\SearchContainer;
use function serialize;

class ActivityInvitationsClientTest extends TestCase
{
    /** @test */
    public function it_can_make_a_request_to_invite_a_user_to_an_activity()
    {
        $client = new ActivityInvitationsClient($this->transport);

        $client->invite(1, 2);

        $this->assertCalled('POST', '/activities/invitations', [
            'user_id'     => 1,
            'activity_id' => 2,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_uninvite_a_user_from_an_activity()
    {
        $client = new ActivityInvitationsClient($this->transport);

        $client->uninvite(1, 2);

        $this->assertCalled('DELETE', '/activities/invitations', [
            'user_id'     => 1,
            'activity_id' => 2,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_search_users_invited_to_an_activity()
    {
        $client    = new ActivityInvitationsClient($this->transport);
        $container = new SearchContainer;
        $container->forPage(1);

        $client->listInvitedUsers(1, $container);

        $this->assertCalled('POST', '/activities/invitations/search', [
            'activity_id' => 1,
            'parameters'  => serialize($container),
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_search_activities_a_user_is_invited_to()
    {
        $client    = new ActivityInvitationsClient($this->transport);
        $container = new SearchContainer;
        $container->forPage(1);

        $client->listInvitedActivities(1, $container);

        $this->assertCalled('POST', '/activities/invitations/search', [
            'user_id'    => 1,
            'parameters' => serialize($container),
        ]);
    }
}
