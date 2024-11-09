<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackCategory extends Model
{
    use HasFactory;

    public function tracks()
    {
        return $this->hasMany(TrackItem::class, 'category', 'id');
    }
}
