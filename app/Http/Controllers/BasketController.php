<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CurrencyService;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class BasketController extends Controller {

    private $basket;

    public function __construct() {
        $this->basket = Basket::getBasket();
    }


    public function index() {
        $currencyService = new CurrencyService();
        $exchangeRate = $currencyService->getExchangeRate() ?? 70;

        $products = $this->basket->products;

        foreach ($products as $product) {
            $product->price_in_rubles = $product->price * $exchangeRate;
        }

        $amountInRubles = $this->basket->getAmount() * $exchangeRate;

        return view('basket.index', compact('products', 'amountInRubles'));
    }


    public function checkout(Request $request) {
        $profile = null;
        $profiles = null;
        if (auth()->check()) { 
            $user = auth()->user();
            $profiles = $user->profiles;
            $prof_id = (int)$request->input('profile_id');
            if ($prof_id) {
                $profile = $user->profiles()->whereIdAndUserId($prof_id, $user->id)->first();
            }
        }
        return view('basket.checkout', compact('profiles', 'profile'));
    }


    public function profile(Request $request) {
        if ( ! $request->ajax()) {
            abort(404);
        }
        if ( ! auth()->check()) {
            return response()->json(['error' => 'Нужна авторизация!'], 404);
        }
        $user = auth()->user();
        $profile_id = (int)$request->input('profile_id');
        if ($profile_id) {
            $profile = $user->profiles()->whereIdAndUserId($profile_id, $user->id)->first();
            if ($profile) {
                return response()->json(['profile' => $profile]);
            }
        }
        return response()->json(['error' => 'Профиль не найден!'], 404);
    }

public function saveOrder(Request $request) {
    $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|max:255',
        'address' => 'required|max:255',
    ]);

    foreach ($this->basket->products as $product) {
        $quantityInBasket = $product->pivot->quantity;

        if ($product->quantity < $quantityInBasket) {
            return redirect()->route('basket.index')->withErrors([
                'error' => "Недостаточное количество товара: {$product->name}"
            ]);
        }
    }

    $user_id = auth()->check() ? auth()->user()->id : null;
    $order = Order::create(
        $request->all() + ['amount' => $this->basket->getAmount(), 'user_id' => $user_id]
    );

    foreach ($this->basket->products as $product) {
        $quantityInBasket = $product->pivot->quantity;

        $order->items()->create([
            'product_id' => $product->id,
            'name' => $product->name,
            'price' => $product->price, 
            'quantity' => $quantityInBasket,
            'cost' => $product->price * $quantityInBasket, 
        ]);

        $product->decrement('quantity', $quantityInBasket);
    }

    $this->basket->clear();

    return redirect()
        ->route('basket.success')
        ->with('order_id', $order->id);
}



public function success(Request $request) {
    if ($request->session()->exists('order_id')) {
        $order_id = $request->session()->pull('order_id');
        $order = Order::with('items')->find($order_id);
        if (!$order) {
            return redirect()->route('basket.index')->withErrors(['error' => 'Заказ не найден']);
        }


        $currencyService = new CurrencyService();
        $exchangeRate = $currencyService->getExchangeRate() ?? 70; 

        foreach ($order->items as $item) {
            $item->price_in_rubles = $item->price * $exchangeRate;
            $item->cost_in_rubles = $item->cost * $exchangeRate;
        }

        $order->amount_in_rubles = $order->amount * $exchangeRate;

        return view('basket.success', compact('order', 'exchangeRate'));
    } else {
        return redirect()->route('basket.index');
    }
}


public function add(Request $request, $id) {
    $product = \App\Models\Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Товар не найден'], 404);
    }

    if ($product->quantity <= 0) {
        return response()->json(['error' => "Товар временно недоступен: {$product->name}"], 400);
    }

    $quantity = (int) $request->input('quantity') ?? 1;

    $itemInBasket = $this->basket->products()->where('product_id', $id)->first();
    $currentQuantityInBasket = $itemInBasket ? $itemInBasket->pivot->quantity : 0;

    if ($product->quantity < ($currentQuantityInBasket + $quantity)) {
        return response()->json(['error' => "Недостаточное количество товара: {$product->name}"], 400);
    }

    $this->basket->increase($id, $quantity);

    if ($request->ajax()) {
        $positions = $this->basket->products()->count();
        return response()->json([
            'success' => 'Товар успешно добавлен в корзину',
            'positions' => $positions,
        ]);
    }

    $positions = $this->basket->products()->count();
    return view('basket.part.basket', compact('positions'));
}


public function plus($id) {
    $product = \App\Models\Product::find($id);

    if (!$product) {
        return redirect()->route('basket.index')->withErrors([
            'error' => 'Товар не найден'
        ]);
    }

    $itemInBasket = $this->basket->products()->where('product_id', $id)->first();
    $currentQuantityInBasket = $itemInBasket ? $itemInBasket->pivot->quantity : 0;

    if ($product->quantity <= $currentQuantityInBasket) {
        return redirect()->route('basket.index')->withErrors([
            'error' => "Недостаточное количество товара: {$product->name}"
        ]);
    }

    $this->basket->increase($id);
    return redirect()->route('basket.index');
}

public function minus($id) {
    $this->basket->decrease($id);
    return redirect()->route('basket.index');
}

    public function remove($id) {
        $this->basket->remove($id);
        return redirect()->route('basket.index');
    }

    public function clear() {
        $this->basket->delete();
        return redirect()->route('basket.index');
    }
}
