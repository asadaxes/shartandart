<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
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
        'sub_total',
    ];

    public static function createOrUpdate($request)
    {
        $checkout = new Checkout();
        $checkout->user_id = auth()->user()->id;
        $checkout->ip_address = $request->ip();
        $checkout->subtotal = $request->subtotal;
        $checkout->save();

        if ($request->product_id) {
            foreach ($request->product_id as $key => $value) {
                $checkoutdetails = new Checkoutdetails();
                $checkoutdetails->checkout_id = $checkout->id;
                $checkoutdetails->product_id = $value;
                $checkoutdetails->user_id = auth()->user()->id;
                $checkoutdetails->ip_address = $request->ip();
                $checkoutdetails->product_name = $request->product_name[$key];
                $checkoutdetails->quantity = $request->quantity[$key];
                $checkoutdetails->price = $request->price[$key];
                $checkoutdetails->total_price = $request->total_price[$key];
                $checkoutdetails->save();
            }
        }
        return $checkout;
    }
}
