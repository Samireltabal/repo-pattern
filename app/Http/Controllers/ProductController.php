<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
           'data' => $this->productRepository->getAllProducts(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return JsonResponse
     */
    public function store(StoreProductRequest $request) : JsonResponse
    {
        return response()->json([
            'data' => $this->productRepository->createProduct($request->all()),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return JsonResponse
     */
    public function show(Request $request) : JsonResponse
    {
        return response()->json([
            'data' => $this->productRepository->getProductById($request->route('product'))
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return JsonResponse
     */
    public function update(UpdateProductRequest $request)
    {
        return response()->json([
            'data' => $this->productRepository->updateProduct($request->route('product'), $request->all())
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request) : JsonResponse
    {
        return response()->json([
            'data' => $this->productRepository->deleteProduct($request->route('product'))
        ], Response::HTTP_OK);
    }
}
