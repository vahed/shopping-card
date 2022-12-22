<?php
namespace App\Http\Repository;

use App\Models\Product;
use Illuminate\Http\Request;

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

    public function getQuantity(Request $request)
    {
        return Product::where('id', '=', $request->id)
            ->with('categories:id,name')
            ->get()[0]["quantity"];
    }
}