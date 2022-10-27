<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function Termwind\render;

class CategoryController extends Controller
{
    /**
     * get all the categories
     * @return \Inertia\Response
     */
    public function index()
    {
        //$category = Category::getCategory();
        $category = Category::all();

        return Inertia::render('Welcome', [ 'category' => $category  ]);
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
