@extends('layout.admin', ['title' => 'Просмотр бренда'])

@section('content')
    <div class="brand-view-container">
        <h1 class="text-white">Просмотр бренда</h1>
        <div class="row">
            <!-- Левая колонка: Информация о бренде -->
            <div class="col-md-6">
                <p class="text-white"><strong>Название:</strong> {{ $brand->name }}</p>
                <p class="text-white"><strong>ЧПУ (англ):</strong> {{ $brand->slug }}</p>
                <p class="text-white"><strong>Краткое описание</strong></p>
                @isset($brand->content)
                    <p class="text-white">{{ $brand->content }}</p>
                @else
                    <p class="text-white">Описание отсутствует</p>
                @endisset
            </div>

            <!-- Правая колонка: Изображение -->
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                @php
                    if ($brand->image) {
                        $url = asset('storage/catalog/brand/source/' . $brand->image);
                    } else {
                        $url = asset('storage/catalog/brand/source/default.jpg');
                    }
                @endphp
                <img src="{{ $url }}" alt="{{ $brand->name }}" class="img-fluid brand-image" style="background-color: aqua;">
            </div>
        </div>

        <!-- Кнопки управления -->
        <div class="mt-4">
            <a href="{{ route('admin.brand.edit', ['brand' => $brand->id]) }}" class="btn btn-success me-2">
                Редактировать бренд
            </a>
            <form method="post" class="d-inline" onsubmit="return confirm('Удалить этот бренд?')"
                    action="{{ route('admin.brand.destroy', ['brand' => $brand->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Удалить бренд
                </button>
            </form>
        </div>
    </div>
@endsection

<style>
    /* Стили для контейнера страницы */
    .brand-view-container {
        background-color: #0d1b2a; /* Темно-синий фон */
        color: #ffffff; /* Белый текст */
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Стили для изображения */
    .brand-image {
        max-width: 300px; /* Максимальная ширина изображения */
        height: auto; /* Сохранение пропорций */
        border: 2px solid #ffffff; /* Белая рамка вокруг изображения */
        border-radius: 8px; /* Закругление углов */
        background-color: #ffffff; /* Фон для PNG-изображений */
        padding: 5px; /* Отступ внутри рамки */
    }

    /* Стили для кнопок */
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>