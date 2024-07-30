
<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Products</h2>
			</div>
		</div>
		<div class="row">

			@foreach ($products as $item)

			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<span class="bage">Sale</span>
						<a href="{{url('/product-details',$item->id)}}"><img class="img-responsive" src="{{ asset('/public/uploads/' . $item->image) }}" alt="product-img" /></a>
						<div class="preview-meta">
							<ul>
								
                                @php
                                $inWishlist = Auth::check() && Auth::user()->wishlistProducts->contains('id', $item->id);
                                @endphp
								<li>
			                        
                                    <form method="POST" action="{{ route('add.to.wishlist', ['id' => $item->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-white{{ $inWishlist ? ' in-wishlist' : '' }}">
                                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M9.9996 16.5451C-6.66672 7.3333 4.99993 -2.6667 9.9996 3.65668C14.9999 -2.6667 26.6666 7.3333 9.9996 16.5451Z" stroke="currentColor" stroke-width="1.5" fill="currentColor"></path>
                                            </svg>
                                          </button>
                                          
                                          <style>
                                            .btn.btn-white {
                                              color: black; /* Set the color to black */
                                            }
                                          </style>
                                          
                                    </form>
								</li>
								<li>
									<a href="{{route('add.to.cart',$item->id)}}"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="{{url('/product-details',$item->id)}}">{{ $item->name }}</a></h4>
						<p class="price">{{ $item->price }} Tk</p>
					</div>
				</div>
			</div>
			
		    @endforeach
	
		</div>
        {{ $products->links() }}
	</div>
</section>