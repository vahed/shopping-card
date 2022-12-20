<?php
namespace App\Http\Repository;

use App\Models\Product;

class ProductRepository
{
    public function showProductWithCategory() 
    {
        return Product::with('categories:id,name')
            ->get();
    }

    public function showProductById($id)
    {
        return Product::where('id', '=', $id)
            ->with('categories:id,name')
            ->get();
    }

    public function getQuantity($id)
    {
        return Product::where('id', '=', $id)
            ->with('categories:id,name')
            ->get()[0]["quantity"];
    }
}