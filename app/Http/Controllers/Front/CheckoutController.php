<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Checkoutdetails;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Union;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use DGvai\SSLCommerz\SSLCommerz;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout($id)
    {
//        return $id;
        $checkoutdetails = Checkoutdetails::where('checkout_id', $id)->get();
        return view('frontend.order.create', [
            'checkoutdetails' => $checkoutdetails,
            'checkout' => Checkout::find($id),
            'divisions'=>Division::all(),
            'districts'=>District::all(),
            'upazilas'=>Upazila::all(),
            'unions'=>Union::all(),
        ]);
    }
    public function create_checkout(Request $request)
    {
//        return $request;
        $ssl=new SSLCommerz();
        $ssl->amount(20)
            ->trxid('DEMOTRX123')
            ->product('Demo Product Name')
            ->customer('Customer Name','custemail@email.com');
        return $ssl->make_payment();
    }




}
