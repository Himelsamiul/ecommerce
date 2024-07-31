<?php

namespace App\Http\Controllers\frontend;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerOne;
use App\Models\BannerTwo;
use App\Models\HeroBanner;
use App\Models\ProductRating;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function home(){


     
          //Category
          $categories = Category::latest()->limit(9)->get();
         
          //Products
          $products = Product::Paginate(12);

          //Latest Products
          $latestProducts = Product::where('status',1)->latest()->limit(6)->get();

        
         return view('frontend.pages.home',
         compact('categories','products','latestProducts'));
    }

}
