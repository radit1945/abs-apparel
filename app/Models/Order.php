<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_phone',
        'total_price',
        'payment_status'
    ];

    // Tambahkan fungsi relasi ini agar bisa memanggil data tracking
    public function trackings()
    {
        return $this->hasMany(OrderTracking::class, 'order_id');
    }
}