<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all();

        return response()->json($products, 200);
    }

    public function show(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        return response()->json($product, 200);
    }

    public function save(SaveProductRequest $request): JsonResponse
    {
        Product::create($request->only(['name', 'price']));
        return response()->json(['message' => 'Product created'], 201);
    }
}
