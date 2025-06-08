<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CurrencyService; 

class OrderController extends Controller {

    public function index() {

    $currencyService = new CurrencyService();
    $exchangeRate = $currencyService->getExchangeRate() ?? 70; 


    $orders = Order::with('items')->orderBy('created_at', 'desc')->paginate(5);

    foreach ($orders as $order) {
        $order->amount_in_rubles = $order->amount * $exchangeRate;
    }

    $statuses = Order::STATUSES;
    return view('admin.order.index', compact('orders', 'statuses', 'exchangeRate'));
    }

    public function show(Order $order) {

    $currencyService = new CurrencyService();
    $exchangeRate = $currencyService->getExchangeRate() ?? 70; 

    foreach ($order->items as $item) {
        $item->price_in_rubles = $item->price * $exchangeRate;
        $item->cost_in_rubles = $item->cost * $exchangeRate;
    }

    $order->amount_in_rubles = $order->amount * $exchangeRate;

    $statuses = Order::STATUSES;
    return view('admin.order.show', compact('order', 'statuses', 'exchangeRate'));
    }

    public function edit(Order $order) {
        $statuses = Order::STATUSES;
        return view('admin.order.edit', compact('order', 'statuses'));
    }

    public function update(Request $request, Order $order) {
        $order->update($request->all());
        return redirect()
            ->route('admin.order.show', ['order' => $order->id])
            ->with('success', 'Заказ был успешно обновлен');
    }
}
