<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class ApiController extends Controller
{
    protected int $statusCode = 200;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondWithSuccess(ResourceCollection|JsonResource $resource, string $message = 'success'): ResourceCollection|JsonResource
    {
        return $resource;
    }

    public function respondWithSuccessCreate(JsonResource $resource, string $message = 'success'): JsonResponse
    {
        return $this->setStatusCode(201)->respondWithArray([
            'data' => $resource,
            'message' => $message
        ]);
    }

    public function noContent($status = 204): JsonResponse
    {
        return new JsonResponse(null, $status);
    }

    public function respondWithArray(array $array, array $headers = [], string $message = 'success'): JsonResponse
    {
        $array = [
            'data' => $array,
            'message' => $message,
        ];

        return response()->json($array, $this->statusCode, $headers);
    }
}
