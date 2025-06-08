<div class="col-md-4 mb-4">
    <a href="{{ route('catalog.product', ['product' => $product->slug]) }}" class="card-link text-decoration-none">
        <div class="card list-item">
            <!-- Слайдер изображений -->
<div class="product-images-slider position-relative">
    @if ($product->images->isNotEmpty())
        @foreach ($product->images as $image)
            <div class="product-image">
                <img src="{{ asset($image->image) }}" 
                    alt="{{ $product->name }}" 
                    class="img-fluid rounded product-thumbnail">
            </div>
        @endforeach
    @else
        <div class="product-image">
            <img src="{{ $product->image ? url('storage/catalog/product/thumb/' . $product->image) : 'https://via.placeholder.com/300x300'  }}" 
                alt="{{ $product->name }}" 
                class="img-fluid rounded product-thumbnail">
        </div>
    @endif
</div>

            <!-- Название товара и описание -->
            <div class="card-body p-3">
                <h3 class="card-title mb-2 text-black">{{ $product->name }}</h3>
                <p class="card-text text-muted small">{{ Str::limit($product->content, 60) }}</p>
                <p style="color: black"><strong>
                    {{ $product->price_in_rubles ? number_format($product->price_in_rubles, 2, '.', '') : 'Курс недоступен' }} ₽
                </strong></p>
            </div>

            <!-- Кнопка "В корзину" -->
            <div class="card-footer bg-transparent border-0">
                <form action="{{ route('basket.add', ['id' => $product->id]) }}" method="post" class="d-inline add-to-basket">
                    @csrf
                    <button type="submit" class="btn btn-success w-100">В корзину</button>
                </form>
            </div>
        </div>
    </a>
</div>

<!-- Подключение CSS для Slick Slider -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css">   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css">   

<!-- Подключение JavaScript для Slick Slider -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>   

<script>
    $(document).ready(function () {
        // Инициализация слайдера для всех карточек товаров
        $('.product-images-slider').each(function () {
            const $slider = $(this);

            // Проверяем количество изображений в слайдере
            if ($slider.find('.product-image').length > 1) {
                // Инициализируем слайдер, если изображений больше одного
                $slider.slick({
                    dots: false, // Убираем точки
                    arrows: false, // Убираем стрелки
                    infinite: true, // Бесконечная прокрутка
                    speed: 500, // Скорость анимации
                    slidesToShow: 1, // Показывать одно изображение за раз
                    adaptiveHeight: true, // Адаптивная высота
                    autoplay: true, // Автоматическое перелистывание
                    autoplaySpeed: 3000, // Интервал между перелистываниями (3 секунды)
                });
            } else {
                // Если изображение только одно, отключаем слайдер
                $slider.addClass('static-image'); // Добавляем класс для стилизации
            }
        });
    });
</script>

<style>
    /* Стили для слайдера */
    .product-images-slider {
        position: relative;
    }

    /* Изображения в слайдере */
    .product-images-slider img {
        width: 100%;
        height: auto;
        object-fit: cover; /* Сохраняем пропорции изображений */
    }

    /* Стили для статического изображения */
    .product-images-slider.static-image {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .product-images-slider.static-image img {
        max-width: 100%;
        height: auto;
    }
    /* Общие стили для всех изображений товаров */
.product-thumbnail {
    width: 100%; /* Ширина изображения равна ширине контейнера */
    height: 300px; /* Фиксированная высота изображения */
    object-fit: cover; /* Сохраняем пропорции изображения, обрезая лишнее */
    border-radius: 8px; /* Округление углов */
}

/* Стили для слайдера изображений */
.product-images-slider {
    position: relative;
    width: 100%;
    max-width: 300px; /* Максимальная ширина слайдера */
    margin: 0 auto; /* Центрируем слайдер */
}

/* Стили для контейнера изображения */
.product-image {
    width: 100%; /* Контейнер занимает всю доступную ширину */
    height: 300px; /* Фиксированная высота контейнера */
    overflow: hidden; /* Скрываем выходящие за границы элементы */
    border-radius: 8px; /* Округление углов */
}
</style>