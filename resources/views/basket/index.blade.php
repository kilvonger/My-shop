@extends('layout.site', ['title' => 'Ваша корзина'])

@section('content')
    <h1>Ваша корзина</h1>
    @if (count($products))
        <form action="{{ route('basket.clear') }}" method="post" class="text-right">
            @csrf
            <button type="submit" class="btn btn-outline-danger mb-4 mt-0">
                Очистить корзину
            </button>
        </form>
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Цена (в рублях)</th>
                <th>Кол-во</th>
                <th>Стоимость (в рублях)</th>
                <th></th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('catalog.product', ['product' => $product->slug]) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td>
                        @if ($product->price_in_rubles)
                            {{ number_format($product->price_in_rubles, 2, '.', '') }} ₽
                        @else
                            <span style="color: red;">Курс недоступен</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('basket.minus', ['id' => $product->id]) }}"
                              method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-minus-square"></i>
                            </button>
                        </form>
                        <span class="mx-1">{{ $product->pivot->quantity }}</span>
                        <form action="{{ route('basket.plus', ['id' => $product->id]) }}"
                              method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-plus-square"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        @if ($product->price_in_rubles)
                            {{ number_format($product->price_in_rubles * $product->pivot->quantity, 2, '.', '') }} ₽
                        @else
                            <span style="color: red;">Курс недоступен</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('basket.remove', ['id' => $product->id]) }}"
                              method="post">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th colspan="4" class="text-right">Итого</th>
                <th>
                    @if ($amountInRubles)
                        {{ number_format($amountInRubles, 2, '.', '') }} ₽
                    @else
                        <span style="color: red;">Курс недоступен</span>
                    @endif
                </th>
                <th></th>
            </tr>
        </table>
        <a href="{{ route('basket.checkout') }}" class="btn btn-success float-right">
            Оформить заказ
        </a>
    @else
        <p>Ваша корзина пуста</p>
    @endif
@endsection