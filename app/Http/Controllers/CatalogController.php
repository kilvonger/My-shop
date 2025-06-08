<?php

namespace App\Http\Controllers;

use App\Helpers\ProductFilter;
use App\Services\CurrencyService;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller {
    public function index() {
        $currencyService = new CurrencyService();
        $exchangeRate = $currencyService->getExchangeRate();

        $roots = Category::where('parent_id', 0)->get();

        $products = Product::where('quantity', '>', 0)->paginate(12);
        $this->convertPricesToRubles($products, $exchangeRate);
        $brands = Brand::popular();

        return view('catalog.index', compact('roots', 'brands', 'products', 'exchangeRate'));
    }


    public function category(Category $category, ProductFilter $filters) {
        $currencyService = new CurrencyService();
        $exchangeRate = $currencyService->getExchangeRate();

        $products = Product::categoryProducts($category->id)
            ->filterProducts($filters)
            ->where('quantity', '>', 0)
            ->paginate(6)
            ->withQueryString();

        $this->convertPricesToRubles($products, $exchangeRate);

        return view('catalog.category', compact('category', 'products', 'exchangeRate'));
    }


    public function brand(Brand $brand, ProductFilter $filters) {
        $currencyService = new CurrencyService();
        $exchangeRate = $currencyService->getExchangeRate();

        $products = $brand
            ->products()
            ->filterProducts($filters)
            ->where('quantity', '>', 0) 
            ->paginate(6)
            ->withQueryString();

        $this->convertPricesToRubles($products, $exchangeRate);

        return view('catalog.brand', compact('brand', 'products', 'exchangeRate'));
    }


public function product(Product $product)
{
    $currencyService = new CurrencyService();
    $exchangeRate = $currencyService->getExchangeRate();

    $priceInRubles = $exchangeRate ? $product->price * $exchangeRate : null;

    $recommendedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->where('quantity', '>', 0)
        ->take(4) 
        ->get();

    if ($exchangeRate) {
        foreach ($recommendedProducts as $item) {
            $item->price_in_rubles = $item->price * $exchangeRate;
        }
    } else {
        foreach ($recommendedProducts as $item) {
            $item->price_in_rubles = null; 
        }
    }

    return view('catalog.product', compact('product', 'recommendedProducts', 'priceInRubles', 'exchangeRate'));
}


    public function search(Request $request) {
        $currencyService = new CurrencyService();
        $exchangeRate = $currencyService->getExchangeRate();

        $search = $request->input('query');
        $query = Product::search($search)
            ->where('quantity', '>', 0); 

        $products = $query->paginate(6)->withQueryString();

        $this->convertPricesToRubles($products, $exchangeRate);

        return view('catalog.search', compact('products', 'search', 'exchangeRate'));
    }


    private function convertPricesToRubles($products, $exchangeRate) {
        if ($exchangeRate) {
            foreach ($products as $product) {
                $product->price_in_rubles = $product->price * $exchangeRate;
            }
        } else {
            foreach ($products as $product) {
                $product->price_in_rubles = null; 
            }
        }
    }
}