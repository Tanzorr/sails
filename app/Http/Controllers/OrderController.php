<?php

namespace App\Http\Controllers;

use App\Actions\OrderItemCreateAction;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Order::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request, OrderItemCreateAction $action): JsonResponse
    {
       $order = Order::create($request->validated());

       $action->handle(['order_id' => $order->id, 'items' => $request->items]);

       return response()->json($order->load(['items']), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): JsonResponse
    {
        return response()->json($order->load(['items', 'customer']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order):JsonResponse
    {
        $order->update($request->validated());
        return response()->json($order->load(['items', 'customer']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully'], 204);
    }
}
