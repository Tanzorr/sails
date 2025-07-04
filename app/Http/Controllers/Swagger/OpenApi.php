<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     title="Shop API",
 *     version="1.0.0",
 *     description="API documentation for Shop application",
 *
 *     @OA\Contact(
 *         email="support@example.com"
 *     ),
 *
 *     @OA\License(
 *         name="MIT",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://127.0.0.1:8000/",
 *     description="Local development server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="JWT Bearer token authentication"
 * )
 *
 *
 * @OA\Tag(
 *     name="Orders",
 *     description="API Endpoints for managing orders"
 * )
 *
 * @OA\Schema(
 *     schema="Order",
 *     type="object",
 *
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="status", type="string", example="pending"),
 *     @OA\Property(property="total_price", type="number", format="float", example=100.00),
 *     @OA\Property(property="payment_status", type="string", example="pending"),
 *     @OA\Property(property="payment_method", type="string", example="cash"),
 *     @OA\Property(property="shipping_address", type="string", example="123 Main St, New York, NY 10030"),
 *     @OA\Property(property="billing_address", type="string", example="123 Main St, New York, NY 10030"),
 *     @OA\Property(property="notes", type="string", example="Please deliver before 5pm"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z")
 * )
 *
 * @OA\Schema(
 *    schema="StoreOrderRequest",
 *    type="object",
 *    required={"user_id", "status", "total_price", "payment_status", "shipping_address", "items"},
 *
 *    @OA\Property(property="user_id", type="integer", example=1),
 *    @OA\Property(property="status", type="string", example="pending"),
 *    @OA\Property(property="total_price", type="number", format="float", example=100.00),
 *    @OA\Property(property="payment_status", type="string", example="pending"),
 *    @OA\Property(property="payment_method", type="string", example="cash"),
 *    @OA\Property(property="shipping_address", type="string", example="123 Main St, New York, NY 10030"),
 *    @OA\Property(property="billing_address", type="string", example="123 Main St, New York, NY 10030"),
 *    @OA\Property(property="notes", type="string", example="Please deliver before 5pm"),
 *    @OA\Property(property="items", type="array", @OA\Items(ref="#/components/schemas/OrderItem"))
 * )
 *
 * @OA\Schema(
 *     schema="OrderItem",
 *     type="object",
 *     required={"product_id", "quantity", "price"},
 *
 *     @OA\Property(property="product_id", type="integer", example=1),
 *     @OA\Property(property="quantity", type="integer", example=1),
 *     @OA\Property(property="price", type="number", format="float", example=100.00),
 *     @OA\Property(property="product_name",type="string", example="Mobile phone"),
 *     @OA\Property(property="total", type="decimal", example="23,00")
 * )
 *
 * @OA\Tag(
 *     name="SharedAccess",
 *     description="Operations related to shared access management"
 * )
 *
 * @OA\Schema(
 *     schema="SharedAccess",
 *     type="object",
 *
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="accessible_type", type="string", example="CategoryModel"),
 *     @OA\Property(property="accessible_id", type="integer", example=1),
 *     @OA\Property(property="expires_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z")
 * )
 *
 * @OA\Schema(
 *     schema="StoreSharedAccessRequest",
 *     type="object",
 *
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="accessible_type", type="string", example="CategoryModel"),
 *     @OA\Property(property="accessible_id", type="integer", example=1),
 *     @OA\Property(property="expires_at", type="string", format="date-time", example="2026-08-01T00:00:00.000000Z")
 * )
 *
 * @OA\Schema(
 *     schema="UpdateSharedAccessRequest",
 *     type="object",
 *     required={"user_id", "accessible_type", "accessible_id"},
 *
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="accessible_type", type="string", example="CategoryModel"),
 *     @OA\Property(property="accessible_id", type="integer", example=1),
 *     @OA\Property(property="expires_at", type="string", format="date-time", example="2028-08-01T00:00:00.000000Z")
 * )
 *
 * @OA\Tag(
 *     name="Media",
 *     description="Operations related to media management"
 * )
 *
 * @OA\Schema(
 *     schema="Media",
 *     type="object",
 *
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="file_name", type="string", example="example.jpg"),
 *     @OA\Property(property="file_path", type="string", example="/uploads/example.jpg"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z")
 * )
 *
 * @OA\Tag(
 *     name="EntityMedia",
 *     description="API Endpoints for managing entity media relations"
 * )
 *
 * @OA\Schema(
 *      schema="EntityMedia",
 *      type="object",
 *
 *      @OA\Property(property="media_id", type="integer", example=1),
 *      @OA\Property(property="mediable_type", type="string", example="user"),
 *      @OA\Property(property="mediable_id", type="integer", example=1)
 * )
 *
 * @OA\Tag(
 *      name="User",
 *      description="Operations related to user management"
 * )
 *
 * @OA\Schema(
 *      schema="User",
 *      type="object",
 *
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="email", type="string", example="admin@example.com"),
 *      @OA\Property(property="name", type="string", example="Admin User"),
 *      @OA\Property(property="created_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z"),
 *      @OA\Property(property="updated_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z")
 * )
 *
 * @OA\Schema(
 *     schema="StoreUserRequest",
 *     type="object",
 *     required={"email", "name", "password"},
 *
 *     @OA\Property(property="email", type="string", example="test#example.com"),
 *     @OA\Property(property="name", type="string", example="Test User"),
 *     @OA\Property(property="password", type="string", example="password")
 * )
 *
 * @OA\Tag(
 *      name="Tag",
 *      description="Operations related to tag management"
 * )
 *
 * @OA\Schema(
 *      schema="Tag",
 *      type="object",
 *
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="Technology"),
 *      @OA\Property(property="created_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z"),
 *      @OA\Property(property="updated_at", type="string", format="date-time", example="2021-08-01T00:00:00.000000Z")
 * )
 *
 * @OA\Schema(
 *     schema="StoreTagRequest",
 *     type="object",
 *     required={"name"},
 *
 *     @OA\Property(property="name", type="string", example="New Tag")
 * )
 */
class OpenApi extends Controller
{
    // This class is only for Swagger annotations
}
