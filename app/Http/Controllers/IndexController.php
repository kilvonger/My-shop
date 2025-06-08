<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CurrencyService;
use Illuminate\Http\Request;

class IndexController extends Controller {
    public function __invoke(Request $request) {
        $currencyService = new CurrencyService();
        $exchangeRate = $currencyService->getExchangeRate() ?? 70; 

        \Log::info('Exchange rate used:', ['rate' => $exchangeRate]);

        $new = Product::whereNew(true)->latest()->limit(3)->get();
        $this->convertPricesToRubles($new, $exchangeRate);

        $hit = Product::whereHit(true)->latest()->limit(3)->get();
        $this->convertPricesToRubles($hit, $exchangeRate);

        $sale = Product::whereSale(true)->latest()->limit(3)->get();
        $this->convertPricesToRubles($sale, $exchangeRate);

        return view('index', compact('new', 'hit', 'sale'));
    }


    private function convertPricesToRubles($products, $exchangeRate) {
        if ($exchangeRate) {
            foreach ($products as $product) {
                $product->price_in_rubles = $product->price * $exchangeRate;
                \Log::info('Product price converted:', [
                    'id' => $product->id,
                    'price_in_usd' => $product->price,
                    'price_in_rubles' => $product->price_in_rubles,
                ]);
            }
        } else {
            foreach ($products as $product) {
                $product->price_in_rubles = null; 
                \Log::warning('Exchange rate unavailable for product:', ['id' => $product->id]);
            }
        }
    }
}