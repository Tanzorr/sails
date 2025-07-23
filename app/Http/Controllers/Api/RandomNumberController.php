<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RandomNumber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RandomNumberController extends Controller
{
    /**
     * geneerate rundom number and save it to the database.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function generate(): JsonResponse
    {
        $randomNumber = RandomNumber::create([
            'value' => rand(1, 1000),
        ]);

        return response()->json([
            'message' => 'Random number generated successfully',
            'id' => $randomNumber->id, // Унікальний ID, по якому можна отримати
            'value' => $randomNumber->value,
        ], 201); // 201 Created
    }

    /**
     * Receive random number by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function retrieve(int $id): JsonResponse
    {
        $randomNumber = RandomNumber::find($id);

        if (!$randomNumber) {
            return response()->json([
                'message' => 'Random number not found',
            ], 404);
        }

        return response()->json([
            'message' => 'Random number retrieved successfully',
            'id' => $randomNumber->id,
            'value' => $randomNumber->value,
        ], 200);
    }
}
