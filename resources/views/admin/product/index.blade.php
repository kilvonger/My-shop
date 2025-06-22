@extends('layout.admin', ['title' => 'Все товары каталога'])

@section('content')
    <h1>Все товары</h1>

    <!-- Блок с категориями и брендами -->
    <div class="d-flex mb-3">
        <!-- Категории -->
        <div class="me-4">
            <strong>Категории:</strong>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($roots as $root)
                    <li>
                        <a href="{{ route('admin.product.category', ['category' => $root->id]) }}">
                            {{ $root->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Бренды -->
        <div class="ms-auto" style="margin-left: 100px;">
            <strong>Бренды:</strong>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($brands as $brand)
                    <li>
                        <a href="{{ route('admin.product.brand', ['brand' => $brand->id]) }}">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Кнопка создания нового товара -->
    <a href="{{ route('admin.product.create') }}" class="btn btn-success mb-4">
        Создать товар
    </a>

    <!-- Таблица товаров -->
    <table class="table table-bordered">
        <tr>
            <th width="25%">Наименование</th>
            <th width="50%">Описание</th>
            <th width="10%">Бренд</th> <!-- Новая колонка -->
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>
                <a href="{{ route('admin.product.show', ['product' => $product->id]) }}">
                    {{ $product->name }}
                </a>
            </td>
            <td>{{ iconv_substr($product->content, 0, 150) }}</td>
            <td>
                {{ $product->brand ? $product->brand->name : 'Нет бренда' }} <!-- Отображение бренда -->
            </td>
            <td>
                <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('admin.product.destroy', ['product' => $product->id]) }}"
                    method="post" onsubmit="return confirm('Удалить этот товар?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                        <i class="far fa-trash-alt text-danger"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- Пагинация -->
    {{ $products->links() }}
@endsection