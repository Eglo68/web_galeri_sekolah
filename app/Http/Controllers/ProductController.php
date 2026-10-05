<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $r)
    {
        $items = Product::query()
            ->when($r->q, fn($q, $s) => $q->where('name', 'like', "%$s%"))
            ->when($r->kategori, fn($q, $c) => $q->where('category', $c))
            ->latest()->paginate(12)->withQueryString();
        return view('products.index', ['items' => $items, 'categories' => Product::CATEGORIES]);
    }
    public function show(Product $product)
    {
        $related = Product::where('category', $product->category)->where('id', '!=', $product->id)->take(4)->get();
        return view('products.show', compact('product', 'related'));
    }
}
