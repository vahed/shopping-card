<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function product_feature(): belongsToMany
    {
        return $this->belongsTo(productFeature::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
