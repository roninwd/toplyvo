<?php

namespace App\Http\Controllers\Api\v1;

use App\Entities\Order\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Resources\Admin\OrderResource;
use App\Http\Resources\Admin\OrderStatusResource;
use App\Services\OrderService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    private OrderService $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function index(): AnonymousResourceCollection
    {
        return $this->service->getAll();
    }

    public function show(Order $order): OrderResource
    {
        return $this->service->getOne($order);
    }

    public function store(OrderCreateRequest $request): JsonResponse
    {
        try {
            $order = $this->service->store($request->validated(), $request->get('items', []));
            return api_response('Created order #' . $order->id, 201);
        } catch (Exception $e) {
            info($e->getMessage());
            return api_response('Error: ' . $e->getMessage(), 500);
        }
    }

    public function update(OrderUpdateRequest $request, Order $order): JsonResponse
    {
        try {
            $this->service->update($order, $request->validated(), $request->get('items', []));
            return api_response('Updated order #' . $order->id, 200);
        } catch (Exception $e) {
            info($e->getMessage());
            return api_response('Error: ' . $e->getMessage(), 500);
        }
    }

    public function destroy(Order $order): JsonResponse
    {
        try {
            $order->delete();
            return api_response('Deleted!', 200);
        } catch (Exception $e) {
            info($e->getMessage());
            return api_response('Error: ' . $e->getMessage(), 500);
        }
    }

    public function changeStatus(Request $request, Order $order): JsonResponse
    {
        $status = $request->get('status');
        try {
            $order->changeStatus($status);
            return api_response("change status to: $status", 200);
        } catch (Exception $e) {
            info($e->getMessage());
            return api_response('Error: ' . $e->getMessage(), 500);
        }
    }

    public function showStatus(Order $order): OrderStatusResource
    {
        return new OrderStatusResource($order);
    }
}
