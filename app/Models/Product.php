<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Stem\LinguaStemRu;

class Product extends Model {

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'content',
        'characteristics',
        'image',
        'price',
        'quantity',
        'new',
        'hit',
        'sale',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }


    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }


    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }

    
    public function scopeCategoryProducts($builder, $id) {
        $descendants = Category::getAllChildren($id);
        $descendants[] = $id;
        return $builder->whereIn('category_id', $descendants);
    }


    public function scopeFilterProducts($builder, $filters)
    {
        return $filters->apply($builder);
    }


public function scopeSearch($query, $search) {
    $search = iconv_substr($search, 0, 64);
    $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);
    $search = preg_replace('#\s+#u', ' ', $search);
    $search = trim($search);

    if (empty($search)) {
        return $query->whereNull('id'); 
    }

    $words = explode(' ', $search);

    $conditions = [];
    $stemmer = new LinguaStemRu();

    foreach ($words as $word) {
        if (iconv_strlen($word) > 3) {
            $stemmedWord = $stemmer->stem_word($word);
            $conditions[] = [
                'products.name', 'LIKE', '%' . $stemmedWord . '%'
            ];
            $conditions[] = [
                'products.content', 'LIKE', '%' . $stemmedWord . '%'
            ];
            $conditions[] = [
                'categories.name', 'LIKE', '%' . $stemmedWord . '%'
            ];
            $conditions[] = [
                'brands.name', 'LIKE', '%' . $stemmedWord . '%'
            ];
        } else {
            $conditions[] = [
                'products.name', 'LIKE', '%' . $word . '%'
            ];
            $conditions[] = [
                'products.content', 'LIKE', '%' . $word . '%'
            ];
            $conditions[] = [
                'categories.name', 'LIKE', '%' . $word . '%'
            ];
            $conditions[] = [
                'brands.name', 'LIKE', '%' . $word . '%'
            ];
        }
    }

    $query->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select('products.*')
            ->where(function ($q) use ($conditions) {
                foreach ($conditions as $condition) {
                    $q->orWhere(...$condition);
                }
            });

    $relevance = "IF (`products`.`name` LIKE '%" . $words[0] . "%', 2, 0)";
    $relevance .= " + IF (`products`.`content` LIKE '%" . $words[0] . "%', 1, 0)";
    $relevance .= " + IF (`categories`.`name` LIKE '%" . $words[0] . "%', 1, 0)";
    $relevance .= " + IF (`brands`.`name` LIKE '%" . $words[0] . "%', 2, 0)";

    for ($i = 1; $i < count($words); $i++) {
        $relevance .= " + IF (`products`.`name` LIKE '%" . $words[$i] . "%', 2, 0)";
        $relevance .= " + IF (`products`.`content` LIKE '%" . $words[$i] . "%', 1, 0)";
        $relevance .= " + IF (`categories`.`name` LIKE '%" . $words[$i] . "%', 1, 0)";
        $relevance .= " + IF (`brands`.`name` LIKE '%" . $words[$i] . "%', 2, 0)";
    }

    $query->orderBy(DB::raw($relevance), 'desc');

    return $query;
}
}
