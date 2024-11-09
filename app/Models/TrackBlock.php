<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackBlock extends Model
{
    use HasFactory;

    public function track()
    {
        return $this->belongsTo(TrackItem::class, 'id', 'track_item_id');
    }

}
