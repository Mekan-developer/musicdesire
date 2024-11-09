<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationItem extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function track()
    {
        return $this->belongsTo(TrackItem::class, 'id');
    }

    public function getChildrenAttribute()
    {
        return LocationItem::where('parent_id', $this->id)->orderBy('title')->get();
    }
}
