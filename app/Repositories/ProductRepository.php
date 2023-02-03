<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{

    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    public function getProductById($id) : Product
    {
        return Product::findOrFail($id);
    }

    public function deleteProduct($id) : bool
    {
        return Product::destroy($id);
    }

    public function createProduct(array $dataArray)
    {
        return Product::create($dataArray);
    }

    public function updateProduct($productId, array $dataArray)
    {
        return Product::whereId($productId)->update($dataArray);
    }

    public function getAvailableProducts()
    {
        return Product::where('in_stock', true);
    }
}
