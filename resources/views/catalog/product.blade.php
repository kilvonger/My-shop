@extends('layout.site')

@section('content')
<!-- Подключение CSS для Slick Slider -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css ">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 



<div class="container mt-5">
    <div class="row">
        <!-- Левая колонка: Изображения -->
        <div class="col-md-6">
            <div class="position-relative">
                <!-- Слайдер изображений -->
                <div class="product-images-slider mb-3">
                    @if ($product->images->isNotEmpty())
                        @foreach ($product->images as $image)
                            <div>
                                <img src="{{ asset($image->image) }}" alt="{{ $product->name }}" class="img-fluid rounded clickable-image" data-image="{{ asset($image->image) }}">
                            </div>
                        @endforeach
                    @else
                        <div>
                            <img src="{{ $product->image ? url('storage/catalog/product/image/' . $product->image) : 'https://via.placeholder.com/600x300' }}"
                                alt="{{ $product->name }}" class="img-fluid rounded clickable-image" data-image="{{ $product->image ? url('storage/catalog/product/image/' . $product->image) : 'https://via.placeholder.com/600x300' }}">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Правая колонка: Информация о товаре -->
        <div class="col-md-6">
            <h1 class="mb-4">{{ $product->name }}</h1>

            <!-- Цена -->
            <p class="text-black mb-4" style="font-size: 1.5rem; font-weight: bold;">
            {{ $priceInRubles ? number_format($priceInRubles, 2, '.', '') : 'Курс недоступен' }} ₽
            </p>

        <!-- Форма добавления в корзину -->
            <form id="addToBasketForm" action="{{ route('basket.add', ['id' => $product->id]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="input-quantity" class="form-label fw-bold">Количество</label>
                    <input type="number" name="quantity" id="input-quantity" value="1" class="form-control w-25" min="1">
                </div>
                <button type="submit" class="btn btn-success btn-lg w-100">Добавить в корзину</button>
            </form>

            <!-- Категория и бренд -->
            <div class="mt-4">
                <p>
                    @isset($product->category)
                        <strong>Категория:</strong>
                        <a href="{{ route('catalog.category', ['category' => $product->category->slug]) }}">
                            {{ $product->category->name }}
                        </a>
                    @endisset
                </p>
                <p>
                    @isset($product->brand)
                        <strong>Бренд:</strong>
                        <a href="{{ route('catalog.brand', ['brand' => $product->brand->slug]) }}">
                            {{ $product->brand->name }}
                        </a>
                    @endisset
                </p>
            </div>
        </div>
    </div>

    <!-- Описание и характеристики -->
    <div class="row mt-5">
        <div class="d-flex justify-content-between">
            <!-- Блок "Описание" -->
            <div class="toggle-block cursor-pointer active" id="toggle-description">
                Описание
            </div>
            <!-- Блок "Характеристики" -->
            <div class="toggle-block cursor-pointer" id="toggle-characteristics">
                Характеристики
            </div>
        </div>
    </div>

    <!-- Блок описания -->
<!-- Блок описания -->
<div class="row mt-3 toggle-content" id="description-block">
    <div class="col-12">
        <p>{{ $product->content }}</p>
        <!-- Добавляем информацию о количестве товара -->
        <p class="text-muted">
            Доступное количество: <strong>{{ $product->quantity }}</strong> шт.
        </p>
    </div>
</div>

    <!-- Блок характеристик -->
    <div class="row mt-3 toggle-content" id="characteristics-block" style="display: none;">
        <div class="col-12">
                    @if ($product->characteristics)
            <ul class="list-unstyled">
                <?php
                // Разбиваем характеристики на массив строк
                $lines = explode("\n", $product->characteristics);

                // Объединяем каждые две строки в одну
                for ($i = 0; $i < count($lines); $i += 2) {
                    $line1 = trim($lines[$i]);
                    $line2 = $i + 1 < count($lines) ? trim($lines[$i + 1]) : '';

                    if (!empty($line1)) {
                        echo '<li>';
                        echo '<strong>' . htmlspecialchars($line1) . '</strong>';
                        echo '<span class="text-muted">' . str_repeat('.', max(0, 50 - strlen($line1))) . '</span>';
                        echo htmlspecialchars($line2);
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        @endif
        </div>
    </div>
</div>

@if ($recommendedProducts && $recommendedProducts->count())
    <hr>
    <h3 class="mt-5 mb-4">Рекомендуемые товары</h3>
    <div class="row">
        @foreach ($recommendedProducts as $item)
            <div class="col-md-3 mb-4">
                <!-- Кликабельная карточка -->
                <a href="{{ route('catalog.product', ['product' => $item->slug]) }}" class="text-decoration-none text-dark">
                    <div class="card h-100">
                        <!-- Изображение -->
                        <img src="{{ $item->images->isNotEmpty() ? asset($item->images->first()->image) : 'https://via.placeholder.com/300x200'  }}" 
                            alt="{{ $item->name }}" class="card-img-top">
                        <!-- Тело карточки -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($item->content, 50) }}</p>
                            <p><strong>{{ $item->price_in_rubles ? number_format($item->price_in_rubles, 2, '.', '') : 'Курс недоступен' }} ₽</strong></p>
                            <form action="{{ route('basket.add', ['id' => $item->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success w-100">В корзину</button>
                            </form>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif

<!-- Модальное окно для увеличенного изображения -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="" alt="{{ $product->name }}" class="img-fluid" id="modalImage">
            </div>
        </div>
    </div>
</div>


<!-- Подключение JavaScript для Slick Slider -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<!-- Подключение Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 
<script>
    $(document).ready(function () {
        // Инициализация слайдера
        $('.product-images-slider').slick({
            dots: true, // Показывать точки для навигации
            infinite: true, // Бесконечная прокрутка
            speed: 300, // Скорость анимации
            slidesToShow: 1, // Показывать одно изображение за раз
            adaptiveHeight: true, // Адаптивная высота
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>', // Стрелка "назад"
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>', // Стрелка "вперёд"
        });

        // Обработчик клика на изображение
        $('.product-images-slider img').on('click', function () {
            const imageSrc = $(this).data('image'); // Получаем путь к изображению
            $('#modalImage').attr('src', imageSrc); // Устанавливаем путь в модальное окно
            $('#imageModal').modal('show'); // Открываем модальное окно
        });

        // Переключение блоков
        $('.toggle-block').on('click', function () {
            const target = $(this).attr('id').replace('toggle-', ''); // Получаем название блока
            $('.toggle-block').removeClass('active'); // Убираем активный класс у всех блоков
            $(this).addClass('active'); // Добавляем активный класс текущему блоку

            $('.toggle-content').slideUp(300); // Скрываем все блоки контента
            $('#' + target + '-block').slideDown(300); // Показываем нужный блок с анимацией
        });
    });

document.addEventListener('DOMContentLoaded', function () {
    // Получаем форму по её уникальному ID
    const form = document.getElementById('addToBasketForm');

    if (form) {
        // Добавляем обработчик события submit
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Предотвращаем стандартное поведение формы

            const formData = new FormData(form); // Получаем данные формы
            const url = form.action; // URL для отправки данных

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // Указываем, что это AJAX-запрос
                },
            })
            .then(response => response.json()) // Получаем JSON-ответ от сервера
            .then(data => {
                if (data.error) {
                    toastr.error(data.error); // Показываем ошибку
                } else if (data.success) {
                    toastr.success(data.success); // Показываем успешное уведомление

                    // Обновляем количество товаров в корзине
                    const basketContainer = document.getElementById('basket-container');
                    if (basketContainer) {
                        basketContainer.innerHTML = `${data.positions} товаров в корзине`;
                    }
                }
            })
            .catch(error => {
                console.error('Ошибка при добавлении товара:', error);
                toastr.error('Произошла ошибка при добавлении товара');
            });
        });
    }
});
</script>

<!-- Стили для стрелок -->
<style>
    /* Стили для бейджей */
    .badge {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
    }

    /* Стили для цены */
    p.text-black {
        font-size: 1.5rem;
        font-weight: bold;
        color: #000;
    }

    /* Стили для кнопки "Добавить в корзину" */
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    /* Стили для стрелок слайдера */
    .slick-prev,
    .slick-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 2rem;
        color: #000; /* Чёрные стрелки */
        background-color: transparent; /* Без фона */
        border: none;
        padding: 0.5rem;
        cursor: pointer;
        z-index: 1;
    }
    .slick-prev {
        left: 10px;
    }
    .slick-next {
        right: 10px;
    }

    /* Стили для модального окна */
    #imageModal .modal-content {
        background-color: #f8f9fa;
    }

    /* Стили для блоков переключения */
    .toggle-block {
        display: inline-block;
        padding: 0.5rem 1rem;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 0.25rem;
        font-weight: bold;
        color: #000;
        transition: all 0.3s ease;
        cursor: pointer;
        margin-right: 20px;
    }
    .toggle-block.active {
        background-color: #000;
        color: #fff;
        border-color: #000;
    }
    .toggle-block:hover:not(.active) {
        background-color: #e9ecef;
        border-color: #ccc;
    }

    /* Стили для контентных блоков */
    .toggle-content {
        border: 1px solid #ddd;
        padding: 1rem;
        border-radius: 0.25rem;
        background-color: #fff;
    }
</style>
@endsection
