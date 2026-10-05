<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $r)
    {
        $items = Article::published()
            ->when($r->q, fn($q, $s) => $q->where('title', 'like', "%$s%"))
            ->when($r->kategori, fn($q, $c) => $q->where('category', $c))
            ->latest('published_at')->paginate(9)->withQueryString();
        return view('articles.index', ['items' => $items, 'categories' => Article::CATEGORIES]);
    }
    public function show(Article $article)
    {
        abort_unless($article->status === 'published', 404);
        $related = Article::published()->where('id', '!=', $article->id)->latest('published_at')->take(3)->get();
        return view('articles.show', compact('article', 'related'));
    }
}
