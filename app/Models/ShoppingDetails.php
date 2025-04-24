<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'address',
        'city',
        'state',
        'zip_code',
        'phone',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
