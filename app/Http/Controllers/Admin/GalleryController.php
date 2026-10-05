<?php
namespace App\Http\Controllers\Admin;
use App\Models\Gallery;
use Illuminate\Validation\Rule;

class GalleryController extends CrudController {
    protected string $model = Gallery::class; protected string $name = 'galleries'; protected string $label = 'Foto';
    protected function rules(): array {
        return ['title' => 'required|max:200', 'category' => ['required', Rule::in(Gallery::CATEGORIES)], 'description' => 'nullable'];
    }
}
