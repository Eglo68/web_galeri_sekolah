<?php
namespace App\Models;

use App\Models\Concerns\HasContent;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasContent;
    const CATEGORIES = ['Seragam', 'Merchandise'];
    protected $guarded = ['id'];
    protected $appends = ['image_url'];

    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:200',
            'sku' => 'nullable|string|max:50',
            'category' => 'required|in:' . implode(',', self::CATEGORIES),
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ];
    }
}
