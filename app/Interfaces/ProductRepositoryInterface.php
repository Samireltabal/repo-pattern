<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductById($productID);
    public function deleteProduct($productId);
    public function createProduct(array $dataArray);
    public function updateProduct($productId,array $dataArray);
    public function getAvailableProducts();
}
