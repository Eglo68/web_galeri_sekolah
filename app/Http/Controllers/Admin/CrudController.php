<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    protected string $model;
    protected string $route;    // nama route: admin.{route}.*
    protected string $title;
    protected string $search;   // kolom untuk pencarian
    protected array $columns = [];
    protected array $fields = [];

    private function ctx(): array
    {
        return ['title' => $this->title, 'route' => $this->route, 'columns' => $this->columns, 'fields' => $this->fields];
    }

    public function index(Request $r)
    {
        $items = $this->model::query()
            ->when($r->q, fn($q, $s) => $q->where($this->search, 'like', "%$s%"))
            ->latest()->paginate(10)->withQueryString();
        return view('admin.crud.index', $this->ctx() + ['items' => $items]);
    }
    public function create() { return view('admin.crud.form', $this->ctx() + ['item' => new $this->model]); }
    public function store(Request $r)
    {
        $this->model::persist($r);
        return redirect()->route("admin.{$this->route}.index")->with('ok', 'Data berhasil disimpan.');
    }
    public function edit($id) { return view('admin.crud.form', $this->ctx() + ['item' => $this->model::findOrFail($id)]); }
    public function update(Request $r, $id)
    {
        $this->model::persist($r, $this->model::findOrFail($id));
        return redirect()->route("admin.{$this->route}.index")->with('ok', 'Perubahan berhasil disimpan.');
    }
    public function destroy($id)
    {
        $item = $this->model::findOrFail($id);
        $item->deleteImage();
        $item->delete();
        return back()->with('ok', 'Data dihapus.');
    }
}
