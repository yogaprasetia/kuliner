<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function getImageUrlAttribute() {
        if ($this->image) {
            return asset($this->image);
        }

        return 'https://placehold.co/150';
    }

    public $timestamps = false;

    public function place() {
        return $this->belongsTo(Place::class);
    }
}
