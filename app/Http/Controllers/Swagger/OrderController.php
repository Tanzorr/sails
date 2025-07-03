<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/orders",
     *     tags={"Orders"},
     *     summary="Get a list of orders",
     *     security={{"bearerAuth": {}}},
     *     operationId="getOrders",
     *
     *     @OA\Response(
     *         response=200,
     *         description="List of orders",
     *
     *         @OA\JsonContent(
     *             type="array",
     *
     *             @OA\Items(ref="#/components/schemas/Order")
     *         )
     *     )
     * )
     */
    public function index()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/orders",
     *     tags={"Orders"},
     *     summary="Create a new order",
     *     security={{"bearerAuth": {}}},
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(ref="#/components/schemas/StoreOrderRequest")
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Order created successfully",
     *
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     )
     * )
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/api/orders/{order}",
     *     tags={"Orders"},
     *     summary="Get details of a specific order",
     *     security={{"bearerAuth": {}}},
     *
     *     @OA\Parameter(
     *         name="order",
     *         in="path",
     *         required=true,
     *         description="Order ID",
     *
     *         @OA\Schema(type="integer")
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Order details",
     *
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     )
     * )
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * @OA\Put(
     *     path="/api/orders/{order}",
     *     tags={"Orders"},
     *     summary="Update an order",
     *     security={{"bearerAuth": {}}},
     *
     *     @OA\Parameter(
     *         name="order",
     *         in="path",
     *         required=true,
     *         description="Order ID",
     *
     *         @OA\Schema(type="integer")
     *     ),
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Order updated successfully",
     *
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     )
     * )
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * @OA\Delete(
     *     path="/api/orders/{order}",
     *     tags={"Orders"},
     *     summary="Delete an order",
     *     security={{"bearerAuth": {}}},
     *
     *     @OA\Parameter(
     *         name="order",
     *         in="path",
     *         required=true,
     *         description="Order ID",
     *
     *         @OA\Schema(type="integer")
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Order deleted successfully",
     *
     *         @OA\JsonContent(
     *
     *             @OA\Property(property="message", type="string", example="Order deleted successfully")
     *         )
     *     )
     * )
     */
    public function destroy(Order $order)
    {
        //
    }
}
