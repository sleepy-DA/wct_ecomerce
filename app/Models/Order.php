<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'total' => 'float',
    ];

    protected $fillable = [
    'user_id',
    'email',
    'first_name',
    'last_name',
    'city',
    'country',
    'shipping_method',
    'payment_method',
    'total',
    'status'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}