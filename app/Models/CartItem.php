<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    public function trackItem()
    {
        return $this->belongsTo(TrackItem::class, 'track_item_id');
    }
}
