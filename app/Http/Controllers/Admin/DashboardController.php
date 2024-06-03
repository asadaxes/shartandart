<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $orderCount = Order::whereDate('created_at', $today)->count();
        $totalSell= Order::sum('amount');
        $totalUser=User::count();
        $totalCategory=Category::count();
        $totalSubCategory=Subcategory::count();
        $totalSubSubCategory=Subsubcategory::count();
        $totalProduct=Product::count();
        $totalBrand=Brand::count();
        return view("admin.dashboard.dashboard",compact( 'orderCount','totalSell','totalUser','totalCategory','totalSubCategory','totalSubSubCategory','totalProduct','totalBrand'));
    }

        public function userlist()
        {
            return view('admin.dashboard.user', [
                'users' => User::all(),
            ]);
        }
}