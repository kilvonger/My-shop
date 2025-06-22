@extends('layout.site', ['title' => 'Ваша корзина'])

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Ваша корзина</h1>

        @if (count($products))
            <!-- Кнопка очистки корзины -->
            <div class="text-end mb-4">
                <form action="{{ route('basket.clear') }}" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fas fa-trash-alt me-2"></i> Очистить корзину
                    </button>
                </form>
            </div>

            <!-- Таблица товаров в корзине -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Наименование</th>
                            <th scope="col"> Цена </th>
                            <th scope="col">Количество</th>
                            <th scope="col">Стоимость</th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('catalog.product', ['product' => $product->slug]) }}" class="text-decoration-none text-dark fw-bold">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td>
                                    @if ($product->price_in_rubles)
                                        <span class="fw-bold">{{ number_format($product->price_in_rubles, 2, '.', '') }} ₽</span>
                                    @else
                                        <span class="text-danger">Курс недоступен</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Минус -->
                                    <form action="{{ route('basket.minus', ['id' => $product->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary p-0 px-1">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </form>
                                    <!-- Количество -->
                                    <span class="mx-2 fw-bold">{{ $product->pivot->quantity }}</span>
                                    <!-- Плюс -->
                                    <form action="{{ route('basket.plus', ['id' => $product->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary p-0 px-1">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    @if ($product->price_in_rubles)
                                        <span class="fw-bold">{{ number_format($product->price_in_rubles * $product->pivot->quantity, 2, '.', '') }} ₽</span>
                                    @else
                                        <span class="text-danger">Курс недоступен</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Удалить товар -->
                                    <form action="{{ route('basket.remove', ['id' => $product->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger p-0 px-1">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="table-light">
                            <th colspan="4" class="text-end">Итого:</th>
                            <th>
                                @if ($amountInRubles)
                                    <span class="fw-bold">{{ number_format($amountInRubles, 2, '.', '') }} ₽</span>
                                @else
                                    <span class="text-danger">Курс недоступен</span>
                                @endif
                            </th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Кнопка оформления заказа -->
            <div class="text-end mt-4" style="margin-bottom: 20px;">
                <a href="{{ route('basket.checkout') }}" class="btn btn-success">
                    <i class="fas fa-check me-2"></i> Оформить заказ
                </a>
            </div>
        @else
            <!-- Сообщение о пустой корзине -->
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="fas fa-shopping-cart me-3 fs-4"></i>
                <div>
                    Ваша корзина пуста. Добавьте товары из <a href="{{ route('catalog.index') }}" class="alert-link">каталога</a>.
                </div>
            </div>
        @endif
    </div>
@endsection