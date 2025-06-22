<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Sport-Universe - Интернет-магазин тренажёров' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css "
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
            crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/site.js') }}"></script>
</head>
<body>
<!-- Обертка для всего контента -->
<div class="wrapper">
    <!-- Навигационная панель -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <a class="navbar-brand" href="{{ route('index') }}">Sport-Universe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbar-example" aria-controls="navbar-example"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-example">
                <ul class="navbar-nav mr-auto custom-navbar-left">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('catalog.index') }}">Каталог</a>
                    </li>
                </ul>
                <form action="{{ route('catalog.search') }}" class="form-inline my-2 my-lg-0 mx-auto">
                    <input class="form-control mr-sm-2" type="search" name="query"
                            placeholder="Поиск по каталогу" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Поиск</button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" id="top-basket">
                        <a class="nav-link @if ($positions) text-success @endif"
                            href="{{ route('basket.index') }}">
                            Корзина
                            @if ($positions) ({{ $positions }}) @endif
                        </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.login') }}">Войти</a>
                        </li>
                        @if (Route::has('user.register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.register') }}">Регистрация</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">Личный кабинет</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <!-- Основной контент -->
    <div class="container">
        <div class="row">
            <!-- Левая колонка: Фильтры или категории -->
            <div class="col-12 col-md-3 mb-4">
                <div class="sidebar">
                    @include('layout.part.roots')
                    @include('layout.part.brands')
                </div>
            </div>

            <!-- Правая колонка: Основной контент -->
            <div class="col-12 col-md-9">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible mt-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible mt-4" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Футер -->
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Информация о компании -->
            <div class="col-md-4">
                <h5>Sport-Universe</h5>
                <p>Интернет-магазин спортивных товаров и тренажёров.</p>
                <p>&copy; {{ date('Y') }} Sport-Universe. Все права защищены.</p>
            </div>

            <!-- Ссылки -->
            <div class="col-md-4">
                <h5>Меню</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('catalog.index') }}" class="text-white text-decoration-none">Каталог</a></li>
                    <li><a href="{{ route('basket.index') }}" class="text-white text-decoration-none">Корзина</a></li>
                    <li><a href="{{ route('user.index') }}" class="text-white text-decoration-none">Личный кабинет</a></li>
                </ul>
            </div>

            <!-- Контакты -->
            <div class="col-md-4">
                <h5>Контакты</h5>
                <p><i class="fas fa-phone"></i> +7 (XXX) XXX-XX-XX</p>
                <p><i class="fas fa-envelope"></i> info@sport-universe.ru</p>
                <p><i class="fas fa-map-marker-alt"></i> Москва, ул. Примерная, д. 1</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>