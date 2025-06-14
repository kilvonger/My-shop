@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Наименование"
            required maxlength="100" value="{{ old('name') ?? $product->name ?? '' }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="slug" placeholder="ЧПУ (на англ.)"
            required maxlength="100" value="{{ old('slug') ?? $product->slug ?? '' }}">
</div>
<div class="form-group">
    <!-- цена (usd) -->
    <!-- цена (usd) -->
    <label for="price">Цена (USD)</label>
    <input type="text" class="form-control w-25 d-inline mr-4" placeholder="Цена (USD)"
            name="price" id="price" required value="{{ old('price') ?? $product->price ?? '' }}">
    
    <!-- Отображение цены в рублях -->
    <div id="price-in-rubles" class="mt-2 text-muted">
        Цена в рублях: <span id="rub-price">0</span> ₽
    </div>


    <!-- новинка -->
    <div class="form-check form-check-inline">
        @php
            $checked = false; // создание нового товара
            if (isset($product)) $checked = $product->new; // редактирование товара
            if (old('new')) $checked = true; // были ошибки при заполнении формы
        @endphp
        <input type="checkbox" name="new" class="form-check-input" id="new-product"
                @if($checked) checked @endif value="1">
        <label class="form-check-label" for="new-product">Новинка</label>
    </div>
    <!-- лидер продаж -->
    <div class="form-check form-check-inline">
        @php
            $checked = false; // создание нового товара
            if (isset($product)) $checked = $product->hit; // редактирование товара
            if (old('hit')) $checked = true; // были ошибки при заполнении формы
        @endphp
        <input type="checkbox" name="hit" class="form-check-input" id="hit-product"
                @if($checked) checked @endif value="1">
        <label class="form-check-label" for="hit-product">Лидер продаж</label>
    </div>
    <!-- распродажа -->
    <div class="form-check form-check-inline ">
        @php
            $checked = false; // создание нового товара
            if (isset($product)) $checked = $product->sale; // редактирование товара
            if (old('sale')) $checked = true; // были ошибки при заполнении формы
        @endphp
        <input type="checkbox" name="sale" class="form-check-input" id="sale-product"
                @if($checked) checked @endif value="1">
        <label class="form-check-label" for="sale-product">Распродажа</label>
    </div>
</div>
<div class="form-group">
    @php
        $category_id = old('category_id') ?? $product->category_id ?? 0;
    @endphp
    <select name="category_id" class="form-control" title="Категория">
        <option value="0">Выберите</option>
        @if (count($items))
            @include('admin.product.part.branch', ['level' => -1, 'parent' => 0])
        @endif
    </select>
</div>
<div class="form-group">
    @php
        $brand_id = old('brand_id') ?? $product->brand_id ?? 0;
    @endphp
    <select name="brand_id" class="form-control" title="Бренд" required>
        <option value="0">Выберите</option>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}" @if ($brand->id == $brand_id) selected @endif>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="quantity">Количество товара</label>
    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $product->quantity ?? 0) }}" min="0" required>
</div>

<div class="form-group">
    <textarea class="form-control" name="content" placeholder="Описание"
            rows="4">{{ old('content') ?? $product->content ?? '' }}</textarea>
</div>
<div class="form-group">
    <textarea class="form-control" name="characteristics" placeholder="Характеристики"
            rows="4">{{ old('characteristics') ?? $product->characteristics ?? '' }}</textarea>
</div>

<!-- Дополнительные изображения -->
<div class="form-group">
    <label for="images" class="btn btn-primary custom-file-upload">
        Загрузить изображения
    </label>
    <input type="file" name="images[]" id="images" multiple class="d-none">
</div>

@if (isset($product) && $product->images->isNotEmpty())
    <div class="row mt-3">
        @foreach ($product->images as $image)
            <div class="col-4 text-center">
                <!-- Изображение с обработчиком клика -->
                <img src="{{ asset($image->image) }}" alt="{{ $product->name }}" 
                    class="img-fluid mb-2 clickable-image" 
                    style="max-height: 100px; cursor: pointer;" 
                    data-image="{{ asset($image->image) }}">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="delete_images[]" value="{{ $image->id }}">
                    <label class="form-check-label">Удалить</label>
                </div>
            </div>
        @endforeach
    </div>
@endif

<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>

<!-- Модальное окно для просмотра изображений -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Просмотр изображения</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="" alt="Изображение товара" class="img-fluid" id="modalImage">
            </div>
        </div>
    </div>
</div>

<!-- JavaScript для обработки кликов -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Обработчик клика на изображениях
        document.querySelectorAll('.clickable-image').forEach(function (img) {
            img.addEventListener('click', function () {
                const modalImage = document.getElementById('modalImage');
                const imageSrc = img.getAttribute('data-image'); // Получаем путь к изображению
                modalImage.setAttribute('src', imageSrc); // Устанавливаем путь в модальное окно
                $('#imageModal').modal('show'); // Открываем модальное окно
            });
        });
    });
// Получение курса валюты через API
async function fetchExchangeRate() {
    try {
        const response = await fetch('https://api.currencyapi.com/v3/latest?apikey=cur_live_SQAEd339UVG9CTCaqrPNfXszVM5nMyqNZSZqq34z&base_currency=USD');
        const data = await response.json();
        return data.data.RUB.value; // Курс доллара к рублю
    } catch (error) {
        console.error('Ошибка при получении курса валют:', error);
        return 80; // Возвращаем значение по умолчанию, если API недоступно
    }
}

document.addEventListener('DOMContentLoaded', async function () {
    const exchangeRate = await fetchExchangeRate(); // Получаем курс валюты
    const priceInput = document.getElementById('price');
    const rubPriceElement = document.getElementById('rub-price');

    function updateRubPrice() {
        const usdPrice = parseFloat(priceInput.value);
        if (!isNaN(usdPrice)) {
            const rubPrice = (usdPrice * exchangeRate).toFixed(2);
            rubPriceElement.textContent = rubPrice;
        } else {
            rubPriceElement.textContent = '0';
        }
    }

    priceInput.addEventListener('input', updateRubPrice);
    updateRubPrice();
});
</script>