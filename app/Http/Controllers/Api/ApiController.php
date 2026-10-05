<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Article, Gallery, Product};
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private const MAP = ['articles' => Article::class, 'products' => Product::class, 'galleries' => Gallery::class];

    private function model(string $resource): string { return self::MAP[$resource] ?? abort(404); }

    private function find(string $m, string $key)
    {
        return (is_numeric($key) ? $m::find($key) : $m::where('slug', $key)->first()) ?? abort(404);
    }

    public function index(Request $r, string $resource)
    {
        $m = $this->model($resource);
        $col = $m === Product::class ? 'name' : 'title';
        return $m::query()
            ->when($m === Article::class, fn($q) => $q->published())
            ->when($r->q, fn($q, $s) => $q->where($col, 'like', "%$s%"))
            ->when($r->kategori, fn($q, $c) => $q->where('category', $c))
            ->latest()->paginate(min($r->integer('per_page', 10), 50));
    }
    public function show(string $resource, string $key) { return $this->find($this->model($resource), $key); }
    public function store(Request $r, string $resource)
    {
        return response()->json($this->model($resource)::persist($r), 201);
    }
    public function update(Request $r, string $resource, string $key)
    {
        $m = $this->model($resource);
        return $m::persist($r, $this->find($m, $key));
    }
    public function destroy(string $resource, string $key)
    {
        $item = $this->find($this->model($resource), $key);
        $item->deleteImage();
        $item->delete();
        return response()->noContent();
    }
}
