@extends('frontend.master')

@section('content')
  <div class="page-wrapper">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
              <div class="product-list">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($products as $wishlist)
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          <img width="80" src="{{ asset('/public/uploads/' . $wishlist->image) }}" alt="" />
                          <a href="#!"> {{ $wishlist->name }}</a>
                        </div>
                      </td>
                      <td class=""> {{ $wishlist->price }} Tk</td>
                      <td class="">
                        <a class="product-remove" href="{{route('remove.Wishlist',$wishlist->id)}}">Remove</a>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <form action="{{ route('cart.add-from-wishlist', $wishlist->id) }}" method="post">
                          @csrf
                          <input type="hidden" name="quantity" value="1" min="1"> <!-- Quantity input -->
                          <button class="btn btn-main pull-right">Add to Cart</button>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="3" class="text-center">No items in the wishlist</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
