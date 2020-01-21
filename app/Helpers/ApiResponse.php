<?php

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    private string $message;
    private int $code;

    public function __construct(string $message, int $code)
    {
        $this->message = $message;
        $this->code = $code;
    }

    public function response(): JsonResponse
    {
        return response()->json(['message' => $this->message], $this->code);
    }
}
