<?php
namespace App\Models;

use App\Models\Concerns\HasContent;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasContent;
    const CATEGORIES = ['Fasilitas', 'Kegiatan Siswa', 'Prestasi', 'Acara'];
    protected $table = 'galleries';
    protected $guarded = ['id'];
    protected $casts = ['taken_at' => 'date'];
    protected $appends = ['image_url'];

    public static function rules(): array
    {
        return [
            'title' => 'required|string|max:200',
            'category' => 'required|in:' . implode(',', self::CATEGORIES),
            'description' => 'nullable|string',
            'taken_at' => 'nullable|date',
            'image' => 'nullable|image|max:4096',
        ];
    }
}
