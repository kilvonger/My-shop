@extends('layout.site', ['title' => 'Заказ размещен'])

@section('content')
    <h1>Заказ размещен</h1>

    <p>Ваш заказ успешно размещен. Наш менеджер скоро свяжется с Вами для уточнения деталей.</p>

    @if ($order)
        <h2>Ваш заказ</h2>
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Стоимость</th>
            </tr>
            @if ($order->items->isNotEmpty())
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @if (isset($item->price_in_rubles))
                                {{ number_format($item->price_in_rubles, 2, '.', '') }} ₽
                            @else
                                <span style="color: red;">Курс недоступен</span>
                            @endif
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            @if (isset($item->cost_in_rubles))
                                {{ number_format($item->cost_in_rubles, 2, '.', '') }} ₽
                            @else
                                <span style="color: red;">Курс недоступен</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Итого</th>
                    <th>
                        @if (isset($order->amount_in_rubles))
                            {{ number_format($order->amount_in_rubles, 2, '.', '') }} ₽
                        @else
                            <span style="color: red;">Курс недоступен</span>
                        @endif
                    </th>
                </tr>
            @else
                <tr>
                    <td colspan="5" class="text-center">Товары в заказе отсутствуют</td>
                </tr>
            @endif
        </table>

        <h2>Ваши данные</h2>
        <p>Имя, фамилия: {{ $order->name }}</p>
        <p>Адрес почты: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
        <p>Номер телефона: {{ $order->phone }}</p>
        <p>Адрес доставки: {{ $order->address }}</p>
        @isset($order->comment)
            <p>Комментарий: {{ $order->comment }}</p>
        @endisset
    @else
        <p>Информация о заказе недоступна. Вернитесь в <a href="{{ route('basket.index') }}">корзину</a>.</p>
    @endif
@endsection