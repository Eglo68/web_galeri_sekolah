<?php
namespace App\Http\Controllers\Admin;

use App\Models\Article;

class ArticleAdminController extends CrudController
{
    protected string $model = Article::class;
    protected string $route = 'artikel';
    protected string $title = 'Kelola Artikel';
    protected string $search = 'title';
    protected array $columns = [
        ['key' => 'title', 'label' => 'Judul'],
        ['key' => 'category', 'label' => 'Kategori', 'type' => 'badge'],
        ['key' => 'status', 'label' => 'Status', 'type' => 'badge'],
        ['key' => 'published_at', 'label' => 'Tanggal', 'type' => 'date'],
    ];
    protected array $fields = [
        ['name' => 'title', 'label' => 'Judul', 'type' => 'text'],
        ['name' => 'category', 'label' => 'Kategori', 'type' => 'select', 'options' => Article::CATEGORIES],
        ['name' => 'author', 'label' => 'Penulis', 'type' => 'text'],
        ['name' => 'published_at', 'label' => 'Tanggal terbit', 'type' => 'date'],
        ['name' => 'status', 'label' => 'Status', 'type' => 'select', 'options' => ['draft' => 'Draf', 'published' => 'Terbit']],
        ['name' => 'image', 'label' => 'Gambar sampul', 'type' => 'file'],
        ['name' => 'excerpt', 'label' => 'Ringkasan (maks. 300 karakter)', 'type' => 'textarea', 'rows' => 2],
        ['name' => 'body', 'label' => 'Isi artikel', 'type' => 'textarea', 'rows' => 12],
    ];
}
