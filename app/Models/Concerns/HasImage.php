<?php
namespace App\Models\Concerns;
trait HasImage {
    public function getImageUrlAttribute(): ?string {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
