<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function Termwind\render;

class CategoryController extends Controller
{
    /**
     * Get all the categories
     * @return \Inertia\Response
     */
    public function index()
    {
        $category = Category::getCategory();
        //$category = Category::all();
        dd($category);
        return Inertia::render('Welcome', [ 'category' => $category  ]);
        //return Inertia::render('Products/Category', [ 'category' => $category  ]);
    }

    /**
     * Get product by category
     * @param $id
     * @return \Inertia\Response
     */
    public function productByCategory($id)
    {
        $productsByCategory = Category::findOrFail($id)->products;

        if($productsByCategory){
            return Inertia::render('Products/ProductsByCategory', ['productsByCategory' => $productsByCategory]);
        }
        else{
            return redirect()->route('Products/ProductsByCategory')->with('message', 'There is no product for this category');
        }
    }

    /**
     * for creating new category for admin purposes
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response|void
     */
    public function createCategory(Request $request)
    {
        $category = Category::getCategory();

        if($request->method()=='GET')
        {
            return Inertia::render('Welcome', [ 'category' => $category  ]);
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'slug'      => 'required|unique:categories',
                'parent_id' => 'nullable|numeric'
            ]);

            Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' =>$request->parent_id
            ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }
}
