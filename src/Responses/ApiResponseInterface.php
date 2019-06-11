<?php

namespace Deviate\Clients\Responses;

use Illuminate\Contracts\Support\Arrayable;

interface ApiResponseInterface extends Arrayable
{
    public function get(string $key, $default = null);
    public function only(array $keys): array;
    public function except(array $keys): array;
}
