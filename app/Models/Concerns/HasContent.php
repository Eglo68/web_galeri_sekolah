<?php
namespace App\Models\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HasContent
{
    protected static function bootHasContent(): void
    {
        static::saving(function ($m) {
            if ($m->slug && !$m->isDirty('title') && !$m->isDirty('name')) return;
            $base = Str::slug($m->title ?? $m->name) ?: 'item';
            $slug = $base; $i = 2;
            while (static::where('slug', $slug)->where('id', '!=', $m->id ?? 0)->exists()) $slug = $base . '-' . $i++;
            $m->slug = $slug;
        });
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : 'https://picsum.photos/seed/' . ($this->slug ?: 'baru') . '/800/600';
    }

    public function deleteImage(): void
    {
        if ($this->image) Storage::disk('public')->delete($this->image);
    }

    /** Dipakai bersama oleh panel admin dan REST API. */
    public static function persist(Request $r, ?self $item = null): self
    {
        $d = $r->validate(static::rules());
        unset($d['image']);
        if ($r->hasFile('image')) {
            $item?->deleteImage();
            $d['image'] = $r->file('image')->store((new static)->getTable(), 'public');
        }
        $item ??= new static;
        $item->fill($d)->save();
        return $item;
    }
}
