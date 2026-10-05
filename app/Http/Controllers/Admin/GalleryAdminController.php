<?php
namespace App\Http\Controllers\Admin;

use App\Models\Gallery;

class GalleryAdminController extends CrudController
{
    protected string $model = Gallery::class;
    protected string $route = 'galeri';
    protected string $title = 'Kelola Galeri';
    protected string $search = 'title';
    protected array $columns = [
        ['key' => 'title', 'label' => 'Judul'],
        ['key' => 'category', 'label' => 'Kategori', 'type' => 'badge'],
        ['key' => 'taken_at', 'label' => 'Tanggal foto', 'type' => 'date'],
    ];
    protected array $fields = [
        ['name' => 'title', 'label' => 'Judul foto', 'type' => 'text'],
        ['name' => 'category', 'label' => 'Kategori', 'type' => 'select', 'options' => Gallery::CATEGORIES],
        ['name' => 'taken_at', 'label' => 'Tanggal foto', 'type' => 'date'],
        ['name' => 'image', 'label' => 'File foto', 'type' => 'file'],
        ['name' => 'description', 'label' => 'Keterangan', 'type' => 'textarea', 'rows' => 4],
    ];
}
