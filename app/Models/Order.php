<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'city',
        'zipcode',
        'total_amount',
    ];

    // สร้างความสัมพันธ์ระหว่าง Order และ OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
