<?php
namespace App\Http\Controllers\Admin;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends CrudController {
    protected string $model = Article::class; protected string $name = 'articles'; protected string $label = 'Artikel';
    protected function rules(): array {
        return ['title' => 'required|max:200', 'category' => ['required', Rule::in(Article::CATEGORIES)],
            'excerpt' => 'nullable|max:300', 'body' => 'required', 'author' => 'required|max:100',
            'status' => 'required|in:draft,published', 'published_at' => 'nullable|date'];
    }
    protected function extra(array $d, Request $r): array {
        if ($d['status'] === 'published' && empty($d['published_at'])) $d['published_at'] = now();
        return $d;
    }
}
