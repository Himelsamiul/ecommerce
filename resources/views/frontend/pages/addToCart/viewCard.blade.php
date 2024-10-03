@extends('frontend.master')

@section('content')
<div class="page-wrapper">
    <div class="cart shopping">
        @if(session()->has('cart') && count(session()->get('cart')) > 0)
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="block">
                        <div class="product-list">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Item Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $subtotal = 0; @endphp
                                    @foreach(session()->get('cart') as $key => $data)
                                    @php $subtotal += $data['subtotal']; @endphp
                                    <tr>
                                        <td>
                                            <div class="product-info">
                                                <img width="80" src="images/shop/cart/cart-1.jpg" alt="" />
                                                <a href="#!"> {{ $data['name'] }} Tk</a>
                                            </div>
                                        </td>
                                        <td>{{ $data['price'] * $data['quantity'] }} Tk</td>
                                        <td>
                                            <a class="product-remove" href="{{ route('cart.item.delete', $key) }}">Remove</a>
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <form action="{{ route('cart.update.quantity', $key) }}" method="POST" style="display: flex; align-items: center;">
                                                    @csrf
                                                    <input
                                                        type="number"
                                                        name="quantity"
                                                        min="1"
                                                        max="1000"
                                                        value="{{ $data['quantity'] }}"
                                                    />
                                                    <button type="submit" class="btn btn-black">Update</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ url('/product-checkout', $key) }}" class="btn btn-main pull-right">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <section class="empty-cart page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block text-center">
                            <i class="tf-ion-ios-cart-outline"></i>
                            <h2 class="text-center">Your cart is currently empty.</h2>
                            <a href="{{ route('home') }}" class="btn btn-main mt-20">Return to shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    </div>
</div>
@endsection
