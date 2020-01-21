<?php

declare(strict_types=1);

use App\Helpers\ApiResponse;

if (!function_exists('api_response')) {
    function api_response(string $message, int $code)
    {
        return (new ApiResponse($message, $code))->response();
    }
}
