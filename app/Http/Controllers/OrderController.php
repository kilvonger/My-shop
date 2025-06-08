<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Services\CurrencyService; 

class OrderController extends Controller {


public function index() {
    $currencyService = new CurrencyService();
    $exchangeRate = $currencyService->getExchangeRate() ?? 70; 

    $orders = Order::whereUserId(auth()->user()->id)
        ->with('items') 
        ->orderBy('created_at', 'desc')
        ->paginate(5);

    foreach ($orders as $order) {
        $order->amount_in_rubles = $order->amount * $exchangeRate;
    }

    $statuses = Order::STATUSES;
    return view('user.order.index', compact('orders', 'statuses', 'exchangeRate'));
}

public function show(Order $order) {
    if (auth()->user()->id !== $order->user_id) {
        abort(404);
    }

    $currencyService = new CurrencyService();
    $exchangeRate = $currencyService->getExchangeRate() ?? 70; 

    foreach ($order->items as $item) {
        $item->price_in_rubles = $item->price * $exchangeRate;
        $item->cost_in_rubles = $item->cost * $exchangeRate;
    }

    $order->amount_in_rubles = $order->amount * $exchangeRate;

    $statuses = Order::STATUSES;
    return view('user.order.show', compact('order', 'statuses', 'exchangeRate'));
}
}
