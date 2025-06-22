@extends('layout.site', ['title' => 'Каталог товаров'])

@section('content')
    <h1>Каталог товаров</h1>

    <p>Добро пожаловать в наш каталог товаров! Здесь вы найдете широкий ассортимент качественных товаров, которые удовлетворят любые ваши потребности. Мы тщательно отбираем продукцию от проверенных производителей, чтобы предложить вам только лучшее.</p>

    <h2 class="mb-4">Разделы каталога</h2>
    <div class="row">
        @foreach ($roots as $root)
            @include('catalog.part.category', ['category' => $root])
        @endforeach
    </div>

    <h2 class="mb-4">Популярные бренды</h2>
    <div class="row">
        @foreach ($brands as $brand)
            @include('catalog.part.brand', ['brand' => $brand])
        @endforeach
    </div>
@endsection


