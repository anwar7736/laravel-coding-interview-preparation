<?php

use Illuminate\Http\JsonResponse;

    function apiResponse(bool $status = true, string $message = '', $data = [], string $url = ''): ?JsonResponse {
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message,
            'url' => $url,
        ]);
    }
?>