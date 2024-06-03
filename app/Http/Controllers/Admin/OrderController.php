<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkoutdetails;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index', [
            'orders' => DB::table('orders')->orderBy('checkout_id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $checkout_id = Order::findOrFail($id)->checkout_id;
        return view('admin.order.show', [
            'checkoutdetails' => Checkoutdetails::where('checkout_id', $checkout_id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.order.edit', [
            'checkoutdetail' => Checkoutdetails::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changestatus(Request $request)
    {
        $checkoutdetail = Checkoutdetails::where('id', $request->checkout_detail_id)->first();
        $checkoutdetail->status = $request->status;
        $checkoutdetail->save();
        return redirect()->back()->with('success','Status Updated Successfully');
    }

    public function orderstatus(Request $request)
    {
        $order = Order::where('id', $request->id)->first();
        if($order->status == 'Pending')
        {
            $order->status = 'Complete';
        }
        elseif($order->status == 'Complete')
        {
            $order->status = 'Pending';
        }
        $order->save();
        return redirect()->back()->with('success','Order Status Updated Successfully');
    }
}