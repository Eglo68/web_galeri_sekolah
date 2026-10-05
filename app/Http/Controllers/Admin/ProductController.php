<?php
namespace App\Http\Controllers\Admin;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductController extends CrudController {
    protected string $model = Product::class; protected string $name = 'products'; protected string $titleCol = 'name'; protected string $label = 'Produk';
    protected function rules(): array {
        $id = request()->route('id');
        return ['name' => 'required|max:200', 'sku' => ['nullable', 'max:50', Rule::unique('products', 'sku')->ignore($id)],
            'category' => ['required', Rule::in(Product::CATEGORIES)], 'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0', 'description' => 'nullable'];
    }
}
