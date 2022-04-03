<?php

namespace App\Traits;

use App\Enums\HTTPHeader;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    protected function success($message = '', $data = [], $status = HTTPHeader::SUCCESS): JsonResponse
    {
        $res = new \stdClass();
        $res->message = $message;
        $res->data = $data;
        return response()->json($res, $status);
    }

    protected function failure($message = '', $status = HTTPHeader::BAD_REQUEST): JsonResponse
    {
        $res = new \stdClass();
        $res->message = $message;
        return response()->json($res, $status);
    }

    protected function abort($message = '', $status = HTTPHeader::BAD_REQUEST)
    {
        abort($status, $message);
    }
}
