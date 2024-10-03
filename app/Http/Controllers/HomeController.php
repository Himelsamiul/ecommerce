<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboard(){
        $totalUsers         = User::get()->count();
        $totalOrder         = Order::get()->count();
        $totalProducts      = Product::get()->count();
        $totalCategories    = Category::get()->count();
       

        return view('backend.pages.dashboard',compact('totalOrder','totalProducts','totalCategories','totalUsers'));
    }
}
