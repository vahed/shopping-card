<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'parent_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function subcategory(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public static function getCategory()
    {
        $allCategories = Category::get();

        $rootCategories = $allCategories->whereNull('parent_id');

        self::getCategoryTree($rootCategories, $allCategories);

        return $rootCategories;
    }

    private static function getCategoryTree($categories, $allCategories)
    {
        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_id', $category->id);

            if($category->children->isNotEmpty()){
                self::getCategoryTree($category->children, $allCategories);
            }
        }
    }
}
