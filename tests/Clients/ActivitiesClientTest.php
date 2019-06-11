<?php

namespace Deviate\Clients\Tests\Clients;

use Deviate\Clients\Clients\ActivitiesClient;
use Deviate\Clients\Tests\TestCase;
use Deviate\Search\SearchContainer;
use function serialize;

class ActivitiesClientTest extends TestCase
{
    /** @test */
    public function it_can_make_a_request_to_fetch_an_activity_by_its_id()
    {
        $client = new ActivitiesClient($this->transport);

        $client->fetchById(1);

        $this->assertCalled('GET', '/activities/1');
    }

    /** @test */
    public function it_can_make_a_request_to_search_activities()
    {
        $client = new ActivitiesClient($this->transport);
        $container = new SearchContainer;
        $container->forPage(1);

        $client->searchActivities($container);

        $this->assertCalled('POST', '/activities/search', [
            'parameters' => serialize($container),
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_create_a_new_activity()
    {
        $client = new ActivitiesClient($this->transport);

        $client->create(1, ['foo' => 'bar']);

        $this->assertCalled('POST', '/activities', [
            'foo' => 'bar',
            'activity_collection_id' => 1,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_update_an_activity()
    {
        $client = new ActivitiesClient($this->transport);

        $client->updateDetails(1, ['foo' => 'bar']);

        $this->assertCalled('PUT', '/activities/1', ['foo' => 'bar']);
    }

    /** @test */
    public function it_can_make_a_request_to_delete_an_activity()
    {
        $client = new ActivitiesClient($this->transport);

        $client->delete(1);

        $this->assertCalled('DELETE', '/activities/1');
    }
}
