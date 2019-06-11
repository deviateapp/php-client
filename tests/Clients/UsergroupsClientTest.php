<?php

namespace Deviate\Clients\Tests\Clients;

use Deviate\Clients\Clients\UsergroupsClient;
use Deviate\Clients\Tests\TestCase;
use Deviate\Search\SearchContainer;
use function serialize;

class UsergroupsClientTest extends TestCase
{
    /** @test */
    public function it_can_make_a_request_to_fetch_a_usergroup()
    {
        $client = new UsergroupsClient($this->transport);

        $client->fetchUsergroup(1);

        $this->assertCalled('GET', '/usergroups/1');
    }

    /** @test */
    public function it_can_make_a_request_to_search_usergroups()
    {
        $client = new UsergroupsClient($this->transport);
        $container = new SearchContainer;
        $container->forPage(1);

        $client->search($container);

        $this->assertCalled('POST', '/usergroups/search', [
            'parameters' => serialize($container),
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_create_a_new_usergroup()
    {
        $client = new UsergroupsClient($this->transport);

        $client->createUsergroup(['foo' => 'bar']);

        $this->assertCalled('POST', '/usergroups', ['foo' => 'bar']);
    }

    /** @test */
    public function it_can_make_a_request_to_update_a_usergroup()
    {
        $client = new UsergroupsClient($this->transport);

        $client->updateUsergroup(1, ['foo' => 'bar']);

        $this->assertCalled('PUT', '/usergroups/1', [
            'foo' => 'bar',
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_delete_a_usergroup()
    {
        $client = new UsergroupsClient($this->transport);

        $client->deleteUsergroup(1);

        $this->assertCalled('DELETE', '/usergroups/1');
    }

    /** @test */
    public function it_can_make_a_request_to_update_a_usergroups_permission()
    {
        $client = new UsergroupsClient($this->transport);

        $client->applyPermissions(1, ['foo' => 'bar']);

        $this->assertCalled('POST', '/usergroups/1/permissions', [
            'permissions' => [
                'foo' => 'bar',
            ],
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_join_a_usergroup()
    {
        $client = new UsergroupsClient($this->transport);

        $client->joinUsergroup(1, 2);

        $this->assertCalled('POST', '/usergroups/2/membership/1');
    }

    /** @test */
    public function it_can_make_a_request_to_remove_a_user_from_a_usergroup()
    {
        $client = new UsergroupsClient($this->transport);

        $client->removeFromUsergroup(1, 2);

        $this->assertCalled('DELETE', '/usergroups/2/membership/1');
    }

    /** @test */
    public function it_can_make_a_request_to_remove_a_user_from_all_usergroups()
    {
        $client = new UsergroupsClient($this->transport);

        $client->removeFromUsergroupByUserId(1);

        $this->assertCalled('DELETE', '/usergroups/membership', [
            'user_id' => 1,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_remove_all_users_from_a_usergroup()
    {
        $client = new UsergroupsClient($this->transport);

        $client->removeUsersByUsergroupId(1);

        $this->assertCalled('DELETE', '/usergroups/membership', [
            'usergroup_id' => 1,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_search_users_in_a_usergroup()
    {
        $client = new UsergroupsClient($this->transport);
        $container = new SearchContainer;
        $container->forPage(1);

        $client->listMembers(1, $container);

        $this->assertCalled('POST', '/usergroups/1/membership/members', [
            'parameters' => serialize($container),
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_list_all_permissions()
    {
        $client = new UsergroupsClient($this->transport);

        $client->listPermissions(true);

        $this->assertCalled('GET', '/permissions', [
            'include_permissions' => true,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_list_all_permissions_granted_to_a_usergroup()
    {
        $client = new UsergroupsClient($this->transport);

        $client->listPermissionsInUsergroup(1);

        $this->assertCalled('GET', '/usergroups/1/permissions');
    }
}
