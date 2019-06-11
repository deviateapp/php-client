<?php

namespace Deviate\Clients\Tests\Responses;

use Deviate\Clients\Responses\ApiResponse;
use Deviate\Clients\Tests\TestCase;

class ApiResponseTest extends TestCase
{
    /** @test */
    public function it_can_return_values_from_the_response()
    {
        $response = new ApiResponse([
            'foo' => 'bar',
        ]);

        $this->assertEquals('bar', $response->get('foo'));
    }

    /** @test */
    public function it_can_return_an_array_of_values_for_an_array_of_specified_keys()
    {
        $response = new ApiResponse([
            'forename' => 'Brody',
            'surname'  => 'Cross',
            'age'      => 3,
        ]);

        $this->assertEquals([
            'forename' => 'Brody',
            'surname'  => 'Cross',
        ], $response->only(['forename', 'surname']));
    }

    /** @test */
    public function it_can_return_an_array_of_values_except_values_for_specified_keys()
    {
        $response = new ApiResponse([
            'forename' => 'Brody',
            'surname'  => 'Cross',
            'age'      => 3,
        ]);

        $this->assertEquals([
            'forename' => 'Brody',
            'age'      => 3,
        ], $response->except(['surname']));
    }

    /** @test */
    public function it_can_return_an_array_of_values()
    {
        $response = new ApiResponse([
            'forename' => 'Brody',
            'surname' => 'Cross',
        ]);

        $this->assertEquals([
            'forename' => 'Brody',
            'surname' => 'Cross',
        ], $response->toArray());
    }
}
