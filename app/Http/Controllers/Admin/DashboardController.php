<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Article, Gallery, Message, Product};

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => [
                'Artikel' => Article::count(),
                'Draf artikel' => Article::where('status', 'draft')->count(),
                'Produk' => Product::count(),
                'Stok menipis (≤10)' => Product::where('stock', '<=', 10)->count(),
                'Foto galeri' => Gallery::count(),
            ],
            'articles' => Article::latest()->take(5)->get(),
            'messages' => Message::latest()->take(5)->get(),
        ]);
    }
}
