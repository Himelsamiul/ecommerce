

  <div class="page-wrapper">
    <div class="checkout shopping">
       <div class="container">
          <div class="row">
             <div class="col-md-8">
                <div class="block billing-details">
                   <h4 class="widget-title">Billing Details</h4>
                   <form action="{{route('pay.now',$products->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                         <label for="full_name"> Name</label>
                         <input type="text" class="form-control" name="full_name" placeholder="">
                         @error('full_name')

                         <small class="text-danger">{{$message}}</small>
     
                         @enderror
                      </div>
                      <div class="form-group">
                         <label for="user_address">Address</label>
                         <input type="text" class="form-control" id="user_address" name="address" placeholder="">

                         @error('address')

                         <small class="text-danger">{{$message}}</small>
     
                         @enderror
                      </div>
                      <div class="checkout-country-code clearfix">
                         <div class="form-group">
                            <label for="user_post_code">Email</label>
                            <input type="email" class="form-control" id="user_post_code" name="email" value="">
                            @error('email')

                            <small class="text-danger">{{$message}}</small>
        
                            @enderror
                         </div>
                         <div class="form-group" >
                            <label for="user_city">Phone</label>
                            <input type="tel" class="form-control" id="user_city" name="phone" value="">
                            @error('phone')

                            <small class="text-danger">{{$message}}</small>
        
                            @enderror
                         </div>
                      </div>
                      <button type="submit"  class="btn btn-main mt-20">Place Order</button >
                   </form>
                </div>
               
             </div>
             <div class="col-md-4">
                <div class="product-checkout-details">
                   <div class="block">
                      <h4 class="widget-title">Order Summary</h4>

                      @if(session()->has('cart') && is_array(session()->get('cart')))
                      @foreach(session()->get('cart') as $data)
                      <div class="media product-card">
                        
                         <div class="media-body">
                            <h4 class="media-heading"><a href="product-single.html">{{$data['name']}} </a></h4>
                            <p class="price">{{$data['price']}} Tk</p>
                           
                         </div>

                      </div>
                      @endforeach
                      @endif

                      
                      <ul class="summary-prices">
                         <li>
                            <span>Subtotal:</span>
                            <span class="price">{{ $subtotal ?? 0 }} Tk.</span>
                         </li>
                         <li>
                            <span>Shipping:</span>
                            <span>Free</span>
                         </li>
                      </ul>
                      <div class="summary-total">
                         <span>Total</span>
                         <span>{{ $subtotal ?? 0 }} Tk.</span>
                      </div>
                      
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>