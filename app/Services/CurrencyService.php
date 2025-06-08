<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyService {
    /**
     * Получает курс доллара к рублю через API.
     *
     * @return float|null Курс валюты или null, если курс недоступен
     */
    public function getExchangeRate() {
        try {
            $response = Http::get('https://api.exchangerate-api.com/v4/latest/USD'); 
            if ($response->successful()) {
                $rates = $response->json()['rates'];
                \Log::info('Exchange rate fetched successfully:', ['rates' => $rates]);
                return $rates['RUB'] ?? null;
            } else {
                \Log::error('Exchange rate API returned an error:', ['status' => $response->status()]);
            }
        } catch (\Exception $e) {
            \Log::error('Error fetching exchange rate:', ['message' => $e->getMessage()]);
        }
        return null;
    }
}