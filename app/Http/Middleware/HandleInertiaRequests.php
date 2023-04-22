<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;
use function PHPUnit\Framework\isEmpty;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $category = Category::getCategory();

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
                'role' => $request->user()?->role,
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'cartCount' => Cart::count(),
            'categoryItems' => $category,//$this->categoryItems(Category::leavesCategory()),
            'flash' => function () use ($request) {
                return [
                    'error' => $request->session()->get('error'),
                    'success' => $request->session()->get('success')
                ];
            }
        ]);
    }

    function categoryItems($arr)//Category::getCategory()
    {
        foreach ($arr as $category) {
//            if($category->children->first()) {
//                echo $category->name.'<br/>';
//            }
//dd($category->children->isEmpty());
                //echo $category->name.'<br/>';
                if($category->children->isEmpty()) {
                    echo $category->children->isEmpty().'<br/>';
                    $this->categoryItems($category->children);
                }
        }

//        foreach ($arr as $category) {
//
//            if($category["name"]) {
//                if($category["children"] == "")
//                    echo $category["name"].'<br/>';
//            }
//            if($category["children"] == "") {
//                $this->categoryItems($category["children"]);
//            }
//        }
    }

}
