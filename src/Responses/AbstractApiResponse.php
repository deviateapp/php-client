<?php

namespace Deviate\Clients\Responses;

use Illuminate\Support\Traits\Macroable;

abstract class AbstractApiResponse implements ApiResponseInterface
{
    use Macroable;
}
