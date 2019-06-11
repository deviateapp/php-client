<?php

namespace Deviate\Clients\Tests\Clients;

use Deviate\Clients\Clients\ActivityCollectionsClient;
use Deviate\Clients\Tests\TestCase;
use Deviate\Search\SearchContainer;
use function serialize;

class ActivityCollectionsClientTest extends TestCase
{
    /** @test */
    public function it_can_make_a_request_to_fetch_a_collection()
    {
        $client = new ActivityCollectionsClient($this->transport);

        $client->fetchCollection(1);

        $this->assertCalled('GET', '/activity-collections/1');
    }

    /** @test */
    public function it_can_make_a_request_to_search_collections()
    {
        $client = new ActivityCollectionsClient($this->transport);
        $container = new SearchContainer;
        $container->forPage(1);

        $client->searchCollections($container);

        $this->assertCalled('POST', '/activity-collections/search', [
            'parameters' => serialize($container),
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_create_a_new_collection()
    {
        $client = new ActivityCollectionsClient($this->transport);

        $client->createCollection(['foo' => 'bar']);

        $this->assertCalled('POST', '/activity-collections', ['foo' => 'bar']);
    }

    /** @test */
    public function it_can_make_a_request_to_list_collections()
    {
        $client = new ActivityCollectionsClient($this->transport);

        $client->listCollections();

        $this->assertCalled('GET', '/activity-collections');
    }

    /** @test */
    public function it_can_make_a_request_to_delete_a_collection()
    {
        $client = new ActivityCollectionsClient($this->transport);

        $client->deleteCollection(1);

        $this->assertCalled('DELETE', '/activity-collections/1');
    }

    /** @test */
    public function it_can_make_a_request_to_update_a_collection()
    {
        $client = new ActivityCollectionsClient($this->transport);

        $client->updateCollection(1, ['foo' => 'bar']);

        $this->assertCalled('PUT', '/activity-collections/1', ['foo' => 'bar']);
    }
}
