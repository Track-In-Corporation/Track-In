<?php

namespace App\Traits;

trait APIResponse {
    public function success($data, $message = null, $statusCode = 200) {
        return response()->json([
            "status" => "success",
            "message" => $message,
            "data" => $data,
        ], $statusCode);
    }

    public function error($message = null, $statusCode = 500, $errors = null) {
        return response()->json([
            "status" => "error",
            "message" => $message,
            "errors" => $errors,
        ], $statusCode);
    }
}
