<?php

namespace Deviate\Clients\Tests\Clients;

use Deviate\Clients\Clients\OrganisationsClient;
use Deviate\Clients\Tests\TestCase;
use Deviate\Search\SearchContainer;

class OrganisationsClientTest extends TestCase
{
    /** @test */
    public function it_can_make_a_request_to_fetch_an_organisation_by_id()
    {
        $client = new OrganisationsClient($this->transport);

        $client->fetchOrganisationById(1);

        $this->assertCalled('GET', '/organisations/1');
    }

    /** @test */
    public function it_can_make_a_request_to_search_organisations()
    {
        $client = new OrganisationsClient($this->transport);
        $container = new SearchContainer();
        $container->forPage(1);
        $container->perPage(10);

        $client->search($container);

        $this->assertCalled('POST', '/organisations/search', [
            'parameters' => serialize($container),
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_create_an_organisation()
    {
        $client = new OrganisationsClient($this->transport);

        $client->createOrganisation(['foo' => 'bar']);

        $this->assertCalled('POST', '/organisations', [
            'foo' => 'bar',
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_update_an_organisation()
    {
        $client = new OrganisationsClient($this->transport);

        $client->updateOrganisation(1, ['foo' => 'bar']);

        $this->assertCalled('PUT', '/organisations/1', [
            'foo' => 'bar',
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_delete_an_organisation()
    {
        $client = new OrganisationsClient($this->transport);

        $client->deleteOrganisation(1);

        $this->assertCalled('DELETE', '/organisations/1');
    }
}
