<!-- Подключение CSS для Slick Slider -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css ">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 

<!-- Подключение JavaScript для Slick Slider -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>   
<!-- Подключение Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 
<!-- Подключение Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 

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
<form id="addToBasketForm_{{ $product->id }}" action="{{ route('basket.add', ['id' => $product->id]) }}" method="post">
    @csrf
    <input type="hidden" name="quantity" value="1">
    <button type="submit" class="btn btn-success w-100">В корзину</button>
</form>
        </div>
    </a>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    // Настройка Toastr
    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right",
        timeOut: 3000,
    };

    // Инициализация слайдера для всех карточек товаров
    document.querySelectorAll('.product-images-slider').forEach(function (slider) {
        const $slider = $(slider);

        if ($slider.find('.product-image').length > 1) {
            $slider.slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 3000,
            });
        } else {
            $slider.addClass('static-image');
        }
    });

    // Обработка отправки формы добавления в корзину
    document.querySelectorAll('[id^="addToBasketForm_"]').forEach(function (form) {
        form.addEventListener('submit', handleFormSubmit);
    });

    // Обработчик отправки формы добавления товара
    function handleFormSubmit(event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        const form = event.target; // Форма, которая вызвала событие
        const formData = new FormData(form); // Получаем данные формы
        const url = form.action; // URL для отправки данных

        // Отключаем кнопку на время запроса
        const button = form.querySelector('button[type="submit"]');
        button.disabled = true;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Добавление...';

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        })
        .then(response => response.json())
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
        })
        .finally(() => {
            // Возвращаем кнопку в исходное состояние
            button.disabled = false;
            button.innerHTML = 'В корзину';
        });
    }
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