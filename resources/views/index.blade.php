@extends('layout.site')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-light mb-4">
        <div class="container">
            <div class="row align-items-center">
                <!-- Левая колонка: Текст -->
                <div class="col-md-8">
                    <h1 class="display-4">Добро пожаловать в Sport-Universe!</h1>
                    <p class="lead">Мы предлагаем широкий выбор профессиональных тренажёров для дома и залов.</p>
                    <a href="{{ route('catalog.index') }}" class="btn btn-primary btn-lg">Перейти в каталог</a>
                </div>
                <!-- Правая колонка: Изображение -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset('img/dumbbell.svg') }}" 
                        alt="Добро пожаловать" 
                        style="max-width: 200px; margin: 0 auto;">
                </div>
            </div>
        </div>
    </div>

    <!-- Секция "Новинки" -->
    @if($new->count())
        <h2 class="text-center mb-4">Новинки</h2>
        <div class="row">
            @foreach($new as $item)
                @include('catalog.part.product', ['product' => $item])
            @endforeach
        </div>
    @endif

    <!-- Секция "Лидеры продаж" -->
    @if($hit->count())
        <h2 class="text-center mb-4">Лидеры продаж</h2>
        <div class="row">
            @foreach($hit as $item)
                @include('catalog.part.product', ['product' => $item])
            @endforeach
        </div>
    @endif

    <!-- Секция "Распродажа" -->
    @if($sale->count())
        <h2 class="text-center mb-4">Распродажа</h2>
        <div class="row">
            @foreach($sale as $item)
                @include('catalog.part.product', ['product' => $item])
            @endforeach
        </div>
    @endif
@endsection