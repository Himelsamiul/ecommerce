<?php

namespace App\Http\Controllers;

use notify;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AddToCartController extends Controller
{

  public function viewCart()
  {
    $cart = session()->get('cart', []);
    return view('frontend.pages.addToCart.viewCard',compact('cart'));
  }

  public function clearCart()
  {
      session()->forget('cart');
      notify()->success('Cart Clear Success.');
      return redirect()->back();
  }
    public function addToCart($id)
    {

        $product=Product::find($id);
        if($product)
        {
            $cart=session()->get('cart');
//            dd($cart);
            if(!$cart)
            {
                    $myCart[$id]=[
                      'name'=>$product->name,
                      'price'=>$product->price,
                      'quantity'=>1,
                      'subtotal'=>$product->price,
                    ];

                  session()->put('cart',$myCart);
                  notify()->success('Product added to the cart');

                  return redirect()->back();
            }

            if(!array_key_exists($id,$cart)){
                $cart[$id]=[
                    'name'=>$product->name,
                    'price'=>$product->price,
                    'quantity'=>1,
                    'subtotal'=>$product->price,
                ];

                session()->put('cart',$cart);
              notify()->success('New product added.');
                return redirect()->back();

            }
            $cart[$id]['quantity']=$cart[$id]['quantity']+1;
            $cart[$id]['subtotal']=$cart[$id]['quantity'] * $cart[$id]['price'];
            session()->put('cart',$cart);

           notify()->success('Cart updated.');
            return redirect()->back();
          }

          Alert::toast()->success('No Product Found.');
          return redirect()->back();


            }

            public function cartItemDelete($id)
            {
              $cart=session()->get('cart');
              unset($cart[$id]);
                session()->put('cart',$cart);
                notify()->success('Product removed.');
              return redirect()->back();
            }

            public function updateCartQuantity(Request $request, $id)
{
  
    $validatedData = $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);


    $cart = session()->get('cart');

    if (isset($cart[$id])) {

        $cart[$id]['quantity'] = $validatedData['quantity'];
        $cart[$id]['subtotal'] = $cart[$id]['quantity'] * $cart[$id]['price'];
        

        session()->put('cart', $cart);

      
        notify()->success('Cart quantity updated successfully.');
    } else {
      
        notify()->error('Product not found in cart.');
    }
    return redirect()->back();
}

        }
