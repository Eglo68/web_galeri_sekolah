<?php
namespace App\Http\Controllers\Admin;

use App\Models\Product;

class ProductAdminController extends CrudController
{
    protected string $model = Product::class;
    protected string $route = 'produk';
    protected string $title = 'Kelola Produk';
    protected string $search = 'name';
    protected array $columns = [
        ['key' => 'name', 'label' => 'Produk'],
        ['key' => 'category', 'label' => 'Kategori', 'type' => 'badge'],
        ['key' => 'price', 'label' => 'Harga', 'type' => 'money'],
        ['key' => 'stock', 'label' => 'Stok'],
    ];
    protected array $fields = [
        ['name' => 'name', 'label' => 'Nama produk', 'type' => 'text'],
        ['name' => 'sku', 'label' => 'SKU', 'type' => 'text'],
        ['name' => 'category', 'label' => 'Kategori', 'type' => 'select', 'options' => Product::CATEGORIES],
        ['name' => 'price', 'label' => 'Harga (Rp)', 'type' => 'number'],
        ['name' => 'stock', 'label' => 'Stok', 'type' => 'number'],
        ['name' => 'image', 'label' => 'Foto produk', 'type' => 'file'],
        ['name' => 'description', 'label' => 'Deskripsi', 'type' => 'textarea', 'rows' => 5],
    ];
}
