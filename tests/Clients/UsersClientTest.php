<?php

namespace Deviate\Clients\Tests\Clients;

use Deviate\Clients\Clients\UsersClient;
use Deviate\Clients\Tests\TestCase;
use Deviate\Search\SearchContainer;
use function serialize;

class UsersClientTest extends TestCase
{
    /** @test */
    public function it_can_make_a_request_to_fetch_a_user_by_their_id()
    {
        $client = new UsersClient($this->transport);

        $client->fetchUserById(1);

        $this->assertCalled('GET', '/users/1');
    }

    /** @test */
    public function it_can_make_a_request_to_fetch_a_user_by_their_remember_token()
    {
        $client = new UsersClient($this->transport);

        $client->fetchUserByRememberToken(1, 'test-token');

        $this->assertCalled('GET', '/users/fetch-by-remember-token', [
            'organisation_id' => 1,
            'token'           => 'test-token',
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_validate_a_users_password()
    {
        $client = new UsersClient($this->transport);

        $client->validatePassword(1, 'testpassword');

        $this->assertCalled('POST', '/users/1/validate-password', [
            'password' => 'testpassword',
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_search_users()
    {
        $client = new UsersClient($this->transport);
        $container = new SearchContainer;
        $container->forPage(1);

        $client->search($container);

        $this->assertCalled('POST', '/users/search', [
            'parameters' => serialize($container),
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_create_a_new_user()
    {
        $client = new UsersClient($this->transport);

        $client->createUser(['foo' => 'bar']);

        $this->assertCalled('POST', '/users', ['foo' => 'bar']);
    }

    /** @test */
    public function it_can_make_a_request_to_update_a_users_password()
    {
        $client = new UsersClient($this->transport);

        $client->updatePassword(1, 'testpassword');

        $this->assertCalled('PUT', '/users/1/password', [
            'password' => 'testpassword',
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_update_a_users_remember_token()
    {
        $client = new UsersClient($this->transport);

        $client->updateRememberToken(1, 'testtoken');

        $this->assertCalled('PUT', '/users/1/remember-token', [
            'token' => 'testtoken',
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_update_a_users_core_details()
    {
        $client = new UsersClient($this->transport);

        $client->updateCoreDetails(1, ['foo' => 'bar']);

        $this->assertCalled('PUT', '/users/1', [
            'foo' => 'bar',
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_deactivate_a_user()
    {
        $client = new UsersClient($this->transport);

        $client->deactivateUser(1);

        $this->assertCalled('PUT', '/users/1/activation', [
            'activate' => false,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_activate_a_user()
    {
        $client = new UsersClient($this->transport);

        $client->reactivateUser(1);

        $this->assertCalled('PUT', '/users/1/activation', [
            'activate' => true,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_delete_a_user()
    {
        $client = new UsersClient($this->transport);

        $client->deleteUser(1);

        $this->assertCalled('DELETE', '/users/1');
    }
}
