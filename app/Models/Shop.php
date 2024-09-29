<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    // กำหนดชื่อ table
    protected $table = 'shops';

    // กำหนด fillable fields
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    // การกำหนดความสัมพันธ์ (ถ้ามี)
    public function reviews()
    {
        return $this->hasMany(Review::class); // ถ้า Shop มีความสัมพันธ์กับ Review
    }
}
