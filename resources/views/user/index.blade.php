@extends('layout.site', ['title' => 'Личный кабинет'])

@section('content')
    <h1 class="mb-4">Личный кабинет</h1>
    <p>Добро пожаловать, {{ auth()->user()->name }}!</p>
    <p>Это личный кабинет постоянного покупателя нашего интернет-магазина.</p>

    <!-- Блоки с изображениями -->
    <div class="row mt-5">
        <!-- Блок "Ваши профили" -->
        <div class="col-md-6 mb-4">
            <a href="{{ route('user.profile.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100">
                    <img src="{{ asset('img/profiles.png') }}" alt="Ваши профили" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title">Ваши профили</h3>
                        <p class="card-text flex-grow-1">Управляйте своими профилями: редактируйте данные, добавляйте новые адреса и контактные данные.</p>
                        <div class="mt-auto">
                            <button class="btn btn-primary w-100">Перейти</button>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Блок "Ваши заказы" -->
        <div class="col-md-6 mb-4">
            <a href="{{ route('user.order.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100">
                    <img src="{{ asset('img/orders.png') }}" alt="Ваши заказы" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title">Ваши заказы</h3>
                        <p class="card-text flex-grow-1">Просматривайте историю заказов, отслеживайте статус доставки и управляйте текущими заказами.</p>
                        <div class="mt-auto">
                            <button class="btn btn-primary w-100">Перейти</button>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Кнопка выхода -->
    <form action="{{ route('user.logout') }}" method="post" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-danger w-100" style="margin-bottom: 50px"> Выйти </button>
    </form>
@endsection