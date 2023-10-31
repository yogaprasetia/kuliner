<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function places() {
        return $this->hasMany(Place::class);
    }
}
