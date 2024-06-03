<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkoutdetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_id',
        'product_id',
        'user_id',
        'ip_address',
        'product_name',
        'quantity',
        'price',
        'total_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}