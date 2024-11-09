<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackItem extends Model
{
    use HasFactory;


    public function blocked()
    {
        return $this->hasMany(TrackBlock::class, 'track_item_id');
    }

    public function orders()
    {
        return $this->hasMany(UserOrderItem::class, 'track_id', 'id');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Models\LocationItem','track_blocks','track_item_id','location_item_id');
    }	
}
