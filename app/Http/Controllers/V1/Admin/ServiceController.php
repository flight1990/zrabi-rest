<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Services\CreateServiceAction;
use App\Actions\Services\DeleteServiceAction;
use App\Actions\Services\FindServiceByIdAction;
use App\Actions\Services\GetServicesAction;
use App\Actions\Services\UpdateServiceAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Services\CreateServiceRequest;
use App\Http\Requests\V1\Services\UpdateServiceRequest;
use App\Http\Resources\V1\ServiceResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ServiceController extends ApiController
{
    public function __construct(
        protected GetServicesAction $getServicesAction,
        protected CreateServiceAction $createServiceAction,
        protected FindServiceByIdAction $findServiceByIdAction,
        protected UpdateServiceAction $updateServiceAction,
        protected DeleteServiceAction $deleteServiceAction
    )
    {}

    public function index(Request $request): ResourceCollection
    {
        $services = $this->getServicesAction->run($request->all());
        return $this->respondWithSuccess(ServiceResource::collection($services));
    }

    public function store(CreateServiceRequest $request): JsonResponse
    {
        $service = $this->createServiceAction->run($request->validated());
        return $this->respondWithSuccessCreate(new ServiceResource($service));
    }

    public function show(int $id): JsonResource
    {
        $service = $this->findServiceByIdAction->run($id);
        return $this->respondWithSuccess(new ServiceResource($service));
    }

    public function update(UpdateServiceRequest $request, int $id): JsonResource
    {
        $service = $this->updateServiceAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new ServiceResource($service));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteServiceAction->run($id);
        return $this->noContent();
    }
}
