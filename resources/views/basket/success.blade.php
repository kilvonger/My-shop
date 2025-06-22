@extends('layout.site', ['title' => 'Заказ размещен'])

@section('content')
    <div class="container mt-5">
        <!-- Заголовок -->
        <h1 class="mb-4">Заказ размещен</h1>

        <!-- Сообщение о размещении заказа -->
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            Ваш заказ успешно размещен. Наш менеджер скоро свяжется с Вами для уточнения деталей.
        </div>

        @if ($order)
            <!-- Информация о заказе -->
            <h2 class="mb-4">Ваш заказ</h2>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Наименование</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Стоимость</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($order->items->isNotEmpty())
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if (isset($item->price_in_rubles))
                                            <span class="fw-bold">{{ number_format($item->price_in_rubles, 2, '.', '') }} ₽</span>
                                        @else
                                            <span class="text-danger">Курс недоступен</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        @if (isset($item->cost_in_rubles))
                                            <span class="fw-bold">{{ number_format($item->cost_in_rubles, 2, '.', '') }} ₽</span>
                                        @else
                                            <span class="text-danger">Курс недоступен</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="table-light">
                                <th colspan="4" class="text-end">Итого:</th>
                                <th>
                                    @if (isset($order->amount_in_rubles))
                                        <span class="fw-bold text-success">{{ number_format($order->amount_in_rubles, 2, '.', '') }} ₽</span>
                                    @else
                                        <span class="text-danger">Курс недоступен</span>
                                    @endif
                                </th>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Товары в заказе отсутствуют</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Данные пользователя -->
            <h2 class="mb-4">Ваши данные</h2>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Имя, фамилия:</strong> {{ $order->name }}</p>
                    <p><strong>Адрес почты:</strong> <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
                    <p><strong>Номер телефона:</strong> {{ $order->phone }}</p>
                    <p><strong>Адрес доставки:</strong> {{ $order->address }}</p>
                    @isset($order->comment)
                        <p><strong>Комментарий:</strong> {{ $order->comment }}</p>
                    @endisset
                </div>
            </div>

            <!-- Кнопки для действий -->
            <div class="mt-4" style="margin-bottom: 20px;">
                <a href="{{ route('catalog.index') }}" class="btn btn-primary me-2">
                    <i class="fas fa-shopping-cart me-2"></i> Вернуться в каталог
                </a>
                <a href="{{ route('basket.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-box me-2"></i> Перейти в корзину
                </a>
            </div>
        @else
            <!-- Если заказ не найден -->
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Информация о заказе недоступна. Вернитесь в <a href="{{ route('basket.index') }}" class="alert-link">корзину</a>.
            </div>
        @endif
    </div>
@endsection