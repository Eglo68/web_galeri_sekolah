<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $r)
    {
        $items = Gallery::query()
            ->when($r->q, fn($q, $s) => $q->where('title', 'like', "%$s%"))
            ->when($r->kategori, fn($q, $c) => $q->where('category', $c))
            ->latest()->paginate(12)->withQueryString();
        return view('gallery.index', ['items' => $items, 'categories' => Gallery::CATEGORIES]);
    }
    public function show(Gallery $gallery)
    {
        $related = Gallery::where('category', $gallery->category)->where('id', '!=', $gallery->id)->take(4)->get();
        return view('gallery.show', compact('gallery', 'related'));
    }
}
