<?php

namespace Deviate\Clients\Tests\Responses;

use Deviate\Clients\Responses\ApiPaginatedResponse;
use Deviate\Clients\Tests\TestCase;

class ApiPaginatedResponseTest extends TestCase
{
    private $responseData = [
        'meta' => [
            'current_page'  => 1,
            'per_page'      => 2,
            'total_pages'   => 3,
            'total_records' => 5,
        ],
        'data' => [
            [
                'name' => 'Brody',
            ],
            [
                'name' => 'Phil',
            ],
        ],
    ];

    /** @test */
    public function it_can_return_the_paginated_data()
    {
        $response = new ApiPaginatedResponse($this->responseData);

        $this->assertEquals([
            [
                'name' => 'Brody',
            ],
            [
                'name' => 'Phil',
            ],
        ], $response->results());
    }

    /** @test */
    public function it_can_return_pagination_meta_data()
    {
        $response = new ApiPaginatedResponse($this->responseData);

        $this->assertEquals(1, $response->currentPage());
        $this->assertEquals(2, $response->perPage());
        $this->assertEquals(3, $response->totalPages());
        $this->assertEquals(5, $response->totalRecords());
    }
}
