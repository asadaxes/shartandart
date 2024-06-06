<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use DGvai\SSLCommerz\SSLCommerz;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
//        return $request;
        $validate = SSLCommerz::validate_payment($request);
        if($validate)
        {
            $bankID = $request->bank_tran_id;   //  KEEP THIS bank_tran_id FOR REFUNDING ISSUE
//            ...
            //  Do the rest database saving works
            //  take a look at dd($request->all()) to see what you need
//            ...
        }
    }
}
