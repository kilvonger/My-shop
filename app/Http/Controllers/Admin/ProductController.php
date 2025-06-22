<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageSaver;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCatalogRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller {

    private $imageSaver;

    public function __construct(ImageSaver $imageSaver) {
        $this->imageSaver = $imageSaver;
    }

public function index() {
    $roots = Category::where('parent_id', 0)->get();
    $brands = Brand::all(); // Получаем все бренды
    $products = Product::paginate(5);
    return view('admin.product.index', compact('products', 'roots', 'brands'));
}

public function brand(Brand $brand) {
    $products = $brand->products()->paginate(5);
    return view('admin.product.brand', compact('brand', 'products'));
}

    public function category(Category $category) {
        $products = $category->products()->paginate(5);
        return view('admin.product.category', compact('category', 'products'));
    }

    public function create() {
        $items = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('items', 'brands'));
    }

    public function store(ProductCatalogRequest $request)
    {
        $request->merge([
            'new' => $request->has('new'),
            'hit' => $request->has('hit'),
            'sale' => $request->has('sale'),
        ]);
    
        $data = $request->all();
    
        $data['image'] = $this->imageSaver->upload($request, null, 'product');
    
        $product = Product::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $this->imageSaver->uploadMultiple($image, 'product');
                $product->images()->create(['image' => $path]);
            }
        }
        
    
        return redirect()
            ->route('admin.product.show', ['product' => $product->id])
            ->with('success', 'Новый товар успешно создан');
    }

    public function show(Product $product) {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product) {
        $items = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'items', 'brands'));
    }


public function update(ProductCatalogRequest $request, Product $product)
{
    $request->merge([
        'new' => $request->has('new'),
        'hit' => $request->has('hit'),
        'sale' => $request->has('sale'),
    ]);

    $data = $request->all();
    $data['image'] = $this->imageSaver->upload($request, $product, 'product');

    if ($request->has('delete_images')) {
        foreach ($request->input('delete_images') as $imageId) {
            $image = $product->images()->find($imageId);
            if ($image) {
                $this->imageSaver->removeImage($image->image); 
                $image->delete(); 
            }
        }
    }

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            $path = $this->imageSaver->uploadMultiple($file, 'product');
            $product->images()->create(['image' => $path]);
        }
    }
    $product->update($data);

    return redirect()
        ->route('admin.product.show', ['product' => $product->id])
        ->with('success', 'Товар был успешно обновлен');
}

    public function destroy(Product $product) {
        $this->imageSaver->remove($product, 'product');
        $product->delete();
    
        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Товар каталога успешно удален');
    }
}
