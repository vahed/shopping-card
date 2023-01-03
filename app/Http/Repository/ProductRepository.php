<?php
namespace App\Http\Repository;

use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\ProductFeature;
use Illuminate\Http\Request;

class ProductRepository
{
    public function showProductWithCategory() 
    {
        return Product::with('productFeatures.images')
            ->get();
    }

    public function showProductById($id)
    {
        return Product::where('id', $id)
            ->with('productFeatures.images')
            ->get();
        
        // return Product::where('id', '=', $id)
        //     ->with('categories:id,name')
        //     ->get();
    }

    public function getQuantity(Request $request)
    {
        return $request->options["totalQty"];
    }
}