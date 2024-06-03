<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'ip_address',
        'product_name',
        'quantity',
        'price',
        'total_price',
    ];

    public static function createOrUpdate($request)
    {
        $order = new Order();
        if ($request->product_id) {
            foreach ($request->product_id as $key => $value) {
                $order->product_id = $value;
                $order->user_id = auth()->user()->id;
                $order->ip_address = $request->ip();
                $order->product_name = $request->product_name[$key];
                $order->quantity = $request->quantity[$key];
                $order->price = $request->price[$key];
                $order->total_price = $request->total_price[$key];
                $order->save();
            }
        }
        return $order;
    }
}
