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
          $categories = Category::latest()->limit(12)->get();
         
          //Products
          $products = Product::Paginate(12);

  
         return view('frontend.pages.home',
         compact('categories','products',));
    }

    public function categoryWiseProduct($id){

        $category = Category::findOrFail($id);

        //Feature Products
        $products = Product::where('category_id', $id)
        ->where('status', 1)->limit(20)
        ->get();



        return view('frontend.pages.catWise',compact('products','category'));
    }

}
