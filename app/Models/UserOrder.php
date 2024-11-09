<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;


    public function tracks()
    {
        return $this->hasMany(UserOrderItem::class, 'order_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(LocationItem::class, 'location_id', 'id');
    }
}
