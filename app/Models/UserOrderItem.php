<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderItem extends Model
{
    use HasFactory;

    public function trackObj()
    {
        return $this->belongsTo(TrackItem::class, 'track_id', 'id');
    }
}
