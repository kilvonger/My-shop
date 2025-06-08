@extends('layout.admin', ['title' => 'Просмотр заказа'])

@section('content')
    <h1>Данные по заказу № {{ $order->id }}</h1>

    <p>
        Статус заказа:
        @if ($order->status == 0)
            <span class="text-danger">{{ $statuses[$order->status] }}</span>
        @elseif (in_array($order->status, [1,2,3]))
            <span class="text-success">{{ $statuses[$order->status] }}</span>
        @else
            {{ $statuses[$order->status] }}
        @endif
    </p>

    <h3 class="mb-3">Состав заказа</h3>
    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>Наименование</th>
            <th>Цена (USD)</th>
            <th>Цена (RUB)</th>
            <th>Кол-во</th>
            <th>Стоимость (USD)</th>
            <th>Стоимость (RUB)</th>
        </tr>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->price, 2, '.', '') }} $</td>
                <td>
                    @if (isset($item->price_in_rubles))
                        {{ number_format($item->price_in_rubles, 2, '.', '') }} ₽
                    @else
                        <span style="color: red;">Курс недоступен</span>
                    @endif
                </td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->cost, 2, '.', '') }} $</td>
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
            <th colspan="5" class="text-right">Итого (USD)</th>
            <th>{{ number_format($order->amount, 2, '.', '') }} $</th>
            <th>
                @if (isset($order->amount_in_rubles))
                    {{ number_format($order->amount_in_rubles, 2, '.', '') }} ₽
                @else
                    <span style="color: red;">Курс недоступен</span>
                @endif
            </th>
        </tr>
    </table>

    <h3 class="mb-3">Данные покупателя</h3>
    <p>Имя, фамилия: {{ $order->name }}</p>
    <p>Адрес почты: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
    <p>Номер телефона: {{ $order->phone }}</p>
    <p>Адрес доставки: {{ $order->address }}</p>
    @isset ($order->comment)
        <p>Комментарий: {{ $order->comment }}</p>
    @endisset
@endsection