<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories:id,name')->get();

        return Inertia::render('Welcome', [ 'products' => $products ]);
    }
}
