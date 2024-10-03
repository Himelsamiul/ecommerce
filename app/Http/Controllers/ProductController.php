<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function productForm(){

        $categories = Category::all();
        return view('backend.pages.product.productForm',compact('categories'));
    }

    public function productStore(Request $request){
       
        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string',
            'category_id'           => 'required',
            'image'                 => 'nullable|max:1000',
            'stock'                 => 'required|integer|min:0',
            'price'                 => 'required|numeric|min:0',
            'discount'              => 'nullable|numeric|min:0|max:100',
            'product_information'   => 'required',
            'status'                => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $images=null;
        if ($request->hasFile('image')) {
            $images=date('Ymdhsis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $images, 'public');
        }

        $product=  Product::create([

             "name"                 =>$request->name,
             "category_id"          =>$request->category_id,
             "image"                =>$images,
             "stock"                =>$request->stock,
             "price"                =>$request->price,
             'product_information'  =>$request->product_information,
             'status'               =>$request->status,
          ]);

          return back()->with('success', 'Product Added Successfully!');

        }


        public function productList(){

            $products = Product::latest()->get();

            return view('backend.pages.product.productList',compact('products'));
        }

        public function productEdit($id){

            $categories = Category::all();

            $edit = Product::find($id);
            return view('backend.pages.product.edit',compact('edit','categories'));
        }

        public function productupdate( Request $request ,$id){

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'category_id'           => 'required',
            'image'                 => 'nullable|max:2000',   
            'stock'                 => 'required|integer',
            'price'                 => 'required',
            'product_information'   => 'required',
            'status'                => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $images=null;
        if ($request->hasFile('image')) {
            $images=date('Ymdhsis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $images, 'public');
        }
         
            $update=Product::find($id);

            $update->update([
             "name"              =>$request->name,
             "category_id"          =>$request->category_id,
             "image"                =>$images,
             "stock"                =>$request->stock,
             "price"                =>$request->price,
             'product_information'  =>$request->product_information,
             'status'               =>$request->status,
            ]);

            return redirect()->back()->with('success','product edited successful!!');

        }

        public function productDelete($id){

            $delete =  Product::find($id);

            $delete->delete();

            Alert::success('Product Deleted Successfully!!');

            return redirect()->back();
        }

            }
