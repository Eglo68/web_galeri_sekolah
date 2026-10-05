<?php
namespace App\Http\Controllers;
use App\Models\{Article, Gallery, Product};
use Illuminate\Http\Request;

class PageController extends Controller {
    public function home() {
        return view('home', [
            'articles' => Article::published()->latest('published_at')->take(3)->get(),
            'products' => Product::latest()->take(4)->get(),
            'galleries' => Gallery::latest()->take(6)->get(),
        ]);
    }
    public function about() { return view('about'); }
    public function contact() { return view('contact'); }
    public function send(Request $r) {
        $r->validate(['name' => 'required|max:100', 'email' => 'required|email', 'subject' => 'required|max:100', 'message' => 'required|max:2000']);
        // Sambungkan ke Mail::to(config('school.email'))->send(...) bila SMTP sudah diatur.
        return back()->with('ok', 'Pesan Anda terkirim. Kami akan membalas secepatnya.');
    }

    private function filter($query, Request $r, string $col) {
        return $query
            ->when($r->kategori, fn($q, $c) => $q->where('category', $c))
            ->when($r->q, fn($q, $s) => $q->where($col, 'like', "%$s%"));
    }
    public function articles(Request $r) {
        $items = $this->filter(Article::published(), $r, 'title')->latest('published_at')->paginate(9)->withQueryString();
        return view('articles.index', ['items' => $items, 'cats' => Article::CATEGORIES]);
    }
    public function article(string $slug) {
        $a = Article::published()->where('slug', $slug)->firstOrFail();
        $a->increment('views');
        $more = Article::published()->where('id', '!=', $a->id)->latest('published_at')->take(3)->get();
        return view('articles.show', compact('a', 'more'));
    }
    public function products(Request $r) {
        $items = $this->filter(Product::query(), $r, 'name')->latest()->paginate(12)->withQueryString();
        return view('products.index', ['items' => $items, 'cats' => Product::CATEGORIES]);
    }
    public function product(string $slug) {
        $p = Product::where('slug', $slug)->firstOrFail();
        $more = Product::where('id', '!=', $p->id)->where('category', $p->category)->take(4)->get();
        return view('products.show', compact('p', 'more'));
    }
    public function galleries(Request $r) {
        $items = $this->filter(Gallery::query(), $r, 'title')->latest()->paginate(12)->withQueryString();
        return view('galleries.index', ['items' => $items, 'cats' => Gallery::CATEGORIES]);
    }
    public function gallery(string $slug) {
        $g = Gallery::where('slug', $slug)->firstOrFail();
        $more = Gallery::where('id', '!=', $g->id)->latest()->take(4)->get();
        return view('galleries.show', compact('g', 'more'));
    }
}
