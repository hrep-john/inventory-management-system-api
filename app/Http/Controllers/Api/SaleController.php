<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiErrorResponse;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Http\Resources\Sale\BasicResource;
use App\Http\Resources\Sale\FullResource;
use App\Http\Services\Contracts\SaleServiceInterface;
use App\Models\Sale;
use App\Traits\ApiResponder;
use App\Traits\Paginable;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class SaleController
{
    use ApiResponder, Paginable;

    protected $service;

    public function __construct(SaleServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $results = $this->service->paginate();
        $results->data = BasicResource::collection($results);

        return $this->success([
            'results' => $this->paginate($results)
        ], Response::HTTP_OK);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->service->store($request->validated());
        } catch (Exception $e) {
            $this->throwError(
                Lang::get('error.save.failed'), 
                Arr::wrap($e->getMessage()), 
                Response::HTTP_INTERNAL_SERVER_ERROR, 
                ApiErrorResponse::SERVER_ERROR_CODE
            );
        }

        return $this->success([
            'result' => new FullResource($result),
            'message' => Lang::get('success.created')
        ], Response::HTTP_CREATED);
    }

    public function show(Int $id)
    {
        $result = $this->service->find($id);

        if (!$result) {
            $this->throwError(
                Lang::get('error.show.failed'), 
                [], 
                Response::HTTP_NOT_FOUND, 
                ApiErrorResponse::UNKNOWN_ROUTE_CODE
            );
        }

        return $this->success([
            'result' => new FullResource($result)], 
            Response::HTTP_OK
        );
    }

    public function update(UpdateRequest $request, Int $id)
    {
        $model = $this->service->find($id);

        if (!$model) {
            $this->throwError(
                Lang::get('error.show.failed'), 
                [], 
                Response::HTTP_NOT_FOUND, 
                ApiErrorResponse::UNKNOWN_ROUTE_CODE
            );
        }

        try {
            $result = $this->service->update($request->validated(), $model);
        } catch (Exception $e) {
            $this->throwError(
                Lang::get('error.update.failed'), 
                Arr::wrap($e->getMessage()), 
                Response::HTTP_INTERNAL_SERVER_ERROR, 
                ApiErrorResponse::SERVER_ERROR_CODE
            );
        }

        return $this->success([
            'result' => new FullResource($result),
            'message' => Lang::get('success.updated')
        ], Response::HTTP_OK);
    }

    public function destroy(Int $id)
    {
        $model = $this->service->find($id);

        if (!$model) {
            $this->throwError(
                Lang::get('error.show.failed'), 
                [], 
                Response::HTTP_NOT_FOUND, 
                ApiErrorResponse::UNKNOWN_ROUTE_CODE
            );
        }

        try {
            $this->service->delete($model);
        } catch (Exception $e) {
            $this->throwError(
                Lang::get('error.delete.failed'), 
                Arr::wrap($e->getMessage()), 
                Response::HTTP_INTERNAL_SERVER_ERROR, 
                ApiErrorResponse::SERVER_ERROR_CODE
            );
        }

        return $this->success(null, Response::HTTP_NO_CONTENT);
    }
}
