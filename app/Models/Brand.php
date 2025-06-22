<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

    protected $fillable = [
        'name',
        'slug',
        'content',
        'image',
    ];


    public function products() {
        return $this->hasMany(Product::class);
    }


    public static function popular() {
        return self::withCount('products')->orderByDesc('products_count')->get();
    }
}
