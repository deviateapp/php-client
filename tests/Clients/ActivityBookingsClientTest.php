<?php

namespace Deviate\Clients\Tests\Clients;

use Deviate\Clients\Clients\ActivityBookingsClient;
use Deviate\Clients\Tests\TestCase;
use Deviate\Search\SearchContainer;
use function serialize;

class ActivityBookingsClientTest extends TestCase
{
    /** @test */
    public function it_can_make_a_request_to_book_an_activity()
    {
        $client = new ActivityBookingsClient($this->transport);

        $client->book(1, 2, true);

        $this->assertCalled('POST', '/activities/bookings', [
            'user_id'       => 1,
            'activity_id'   => 2,
            'force_booking' => true,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_unbook_an_activity()
    {
        $client = new ActivityBookingsClient($this->transport);

        $client->unbook(1, 2, true);

        $this->assertCalled('DELETE', '/activities/bookings', [
            'user_id'         => 1,
            'activity_id'     => 2,
            'force_unbooking' => true,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_check_if_an_activity_can_be_booked()
    {
        $client = new ActivityBookingsClient($this->transport);

        $client->canBook(1, 2, true);

        $this->assertCalled('GET', '/activities/bookings/can-book', [
            'user_id'            => 1,
            'activity_id'        => 2,
            'with_force_booking' => true,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_check_if_an_activity_can_be_unbooked()
    {
        $client = new ActivityBookingsClient($this->transport);

        $client->canUnbook(1, 2, true);

        $this->assertCalled('GET', '/activities/bookings/can-unbook', [
            'user_id'              => 1,
            'activity_id'          => 2,
            'with_force_unbooking' => true,
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_search_users_booked_on_an_activity()
    {
        $client    = new ActivityBookingsClient($this->transport);
        $container = new SearchContainer;
        $container->forPage(1);

        $client->listBookedUsers(1, $container);

        $this->assertCalled('POST', '/activities/bookings/search', [
            'activity_id' => 1,
            'parameters'  => serialize($container),
        ]);
    }

    /** @test */
    public function it_can_make_a_request_to_search_activities_a_user_is_booked_on()
    {
        $client    = new ActivityBookingsClient($this->transport);
        $container = new SearchContainer;
        $container->forPage(1);

        $client->listBookedActivities(1, $container);

        $this->assertCalled('POST', '/activities/bookings/search', [
            'user_id'    => 1,
            'parameters' => serialize($container),
        ]);
    }
}
