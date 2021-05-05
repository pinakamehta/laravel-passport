<?php

if (!function_exists('customResponse')) {
    function customResponse($status, $message, $data = [])
    {
        return response()->json([
            'success' => $status,
            'message' => $message,
            'data'    => $data,
        ]);
    }
}
