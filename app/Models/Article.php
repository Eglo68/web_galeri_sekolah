<?php
namespace App\Models;

use App\Models\Concerns\HasContent;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasContent;
    const CATEGORIES = ['Acara', 'Prestasi', 'Pengumuman', 'Akademik'];
    protected $guarded = ['id'];
    protected $casts = ['published_at' => 'date'];
    protected $appends = ['image_url'];

    public function scopePublished($q) { return $q->where('status', 'published'); }

    public static function rules(): array
    {
        return [
            'title' => 'required|string|max:200',
            'category' => 'required|in:' . implode(',', self::CATEGORIES),
            'excerpt' => 'nullable|string|max:300',
            'body' => 'required|string',
            'author' => 'nullable|string|max:100',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ];
    }
}
