<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function index()
   {
    return view('frontend.login.index');
   }

   public function register()
   {
    return view('frontend.login.register');
   }
}
