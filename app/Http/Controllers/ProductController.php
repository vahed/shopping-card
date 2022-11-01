<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories:id,name')
            ->get();

        return Inertia::render('Products/Product', [ 'products' => $products ]);
    }


    public function show($id)
    {
        $product = Product::where('id', '=', $id)
            ->with('categories:id,name')
            ->get();

        return Inertia::render('Show', [ 'product' => $product ]);
    }
}
