<?php

namespace App\Http\Controllers;

use App\Models\Checkoutdetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('salesman')){
            return redirect()->route('admin.dashboard')->with('status', 'Welcome to the admin dashboard');
        }
        else{
            return redirect()->route('user.dashboard')->with('status', 'Welcome to the dashboard');
        }
    }

    public function user()
    {
        $wishlist = Session::get('wishlist', []);
        return view('frontend.dashboard.index', [
            'user' => auth()->user(),
            'wishlists' => $wishlist,
            'checkoutdetails' => Checkoutdetails::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
