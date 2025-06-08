jQuery(document).ready(function($) {
    /*
     * Общие настройки ajax-запросов, отправка на сервер csrf-токена
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*
     * Раскрытие и скрытие пунктов меню каталога в левой колонке
     */
    $(document).ready(function () {
        // Скрываем все вложенные категории при загрузке страницы
        $('.nested-category').hide();
    
        // Обработчик клика на значок плюсика/минуса
        $('.toggle-category').on('click', function (e) {
            e.preventDefault(); // Предотвращаем стандартное поведение ссылки (если есть)
    
            // Находим целевой элемент (вложенный список)
            const targetId = $(this).data('target'); // Получаем id из data-target
            const $target = $('#' + targetId); // Находим элемент по id
    
            // Переключаем видимость вложенного списка
            if ($target.is(':visible')) {
                $target.slideUp('normal', function () {
                    // Меняем значок на плюсик
                    $(this).siblings('.toggle-category').find('i')
                        .removeClass('fa-minus')
                        .addClass('fa-plus');
                });
            } else {
                $target.slideDown('normal', function () {
                    // Меняем значок на минус
                    $(this).siblings('.toggle-category').find('i')
                        .removeClass('fa-plus')
                        .addClass('fa-minus');
                });
            }
        });
    });
    /*
     * Получение данных профиля пользователя при оформлении заказа
     */
    $('form#profiles button[type="submit"]').hide();
    // при выборе профиля отправляем ajax-запрос, чтобы получить данные
    $('form#profiles select').change(function () {
        // если выбран элемент «Выберите профиль»
        if ($(this).val() == 0) {
            // очищаем все поля формы оформления заказа
            $('#checkout').trigger('reset');
            return;
        }
        var data = new FormData($('form#profiles')[0]);
        $.ajax({
            url: '/basket/profile',
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: 'JSON',
            success: function(data) {
                if (data.profile === undefined) {
                    console.log('data undefined');
                }
                $('input[name="name"]').val(data.profile.name);
                $('input[name="email"]').val(data.profile.email);
                $('input[name="phone"]').val(data.profile.phone);
                $('input[name="address"]').val(data.profile.address);
                $('textarea[name="comment"]').val(data.profile.comment);
            },
            error: function (reject) {
                alert(reject.responseJSON.error);
            }
        });
    });
    /*
     * Добавление товара в корзину с помощью ajax-запроса без перезагрузки
     */
    $('form.add-to-basket').submit(function (e) {
        // отменяем отправку формы стандартным способом
        e.preventDefault();
        // получаем данные этой формы добавления в корзину
        var $form = $(this);
        var data = new FormData($form[0]);
        $.ajax({
            url: $form.attr('action'),
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: 'HTML',
        });
    });
    $(document).ready(function () {
        // Инициализация слайдера
        $('.product-images-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        });
    
        // Обработчик клика на изображение
        $('.product-images-slider img').on('click', function () {
            const imageSrc = $(this).data('image'); // Получаем путь к изображению
            $('#imageModal img').attr('src', imageSrc); // Устанавливаем путь в модальное окно
            $('#imageModal').modal('show'); // Открываем модальное окно
        });
    });
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
    });
});


