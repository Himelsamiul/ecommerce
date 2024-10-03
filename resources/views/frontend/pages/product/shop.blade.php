@extends('frontend.master')

  @section('content')



<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Shop</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">shop</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="products section bg-gray">
	<div class="container">
		<!-- Title Section -->
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="section-title">Products</h2>
			</div>
		</div>
		
		<!-- Product Items -->
		<div class="row">
			@foreach ($products as $item)
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="product-item">
					<!-- Product Image and Badge -->
					<div class="product-thumb">
						@if($item->discount)
						<span class="bage">Sale</span>
						@endif
						<a href="{{ url('/product-details', $item->id) }}">
							<img class="img-fluid" src="{{ asset('/public/uploads/' . $item->image) }}" alt="{{ $item->name }}">
						</a>
						<!-- Wishlist and Cart Icons -->
						<div class="preview-meta">
							<ul class="list-inline">
								<!-- Wishlist Button -->
								@php
								$inWishlist = Auth::check() && Auth::user()->wishlistProducts->contains('id', $item->id);
								@endphp
								<li class="list-inline-item">
									<form method="POST" action="{{ route('add.to.wishlist', ['id' => $item->id]) }}">
										@csrf
										<button type="submit" class="btn btn-white{{ $inWishlist ? ' in-wishlist' : '' }}">
											<svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M9.9996 16.5451C-6.66672 7.3333 4.99993 -2.6667 9.9996 3.65668C14.9999 -2.6667 26.6666 7.3333 9.9996 16.5451Z" stroke="currentColor" stroke-width="1.5" fill="currentColor"></path>
											</svg>
										</button>
									</form>
								</li>
								<!-- Add to Cart Icon -->
								<li class="list-inline-item">
									<a href="{{ route('add.to.cart', $item->id) }}" class="btn btn-cart">
										<i class="tf-ion-android-cart"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					
					<!-- Product Information -->
					<div class="product-content text-center"><br>
  
					  <div class="star-rating">
						<ul class="list-inline">
							<li class="list-inline-item">
								<i class="tf-ion-star filled"></i>
							</li>
							<li class="list-inline-item">
								<i class="tf-ion-star filled"></i>
							</li>
							<li class="list-inline-item">
								<i class="tf-ion-star filled"></i>
							</li>
							<li class="list-inline-item">
								<i class="tf-ion-star"></i>
							</li>
							<li class="list-inline-item">
								<i class="tf-ion-star"></i>
							</li>
						</ul>
					</div>
  
					
						<h4 class="product-name">
							<a href="{{ url('/product-details', $item->id) }}">{{ $item->name }}</a>
						</h4>
						<div class="price">
							<p>{{ $item->price }} Tk</p>
						</div>
  
						
					</div>
				</div>
			</div>
			@endforeach
		</div>
  
		<!-- Pagination Links -->
		<div class="row">
			<div class="col-12 text-center">
				{{ $products->links() }}
			</div>
		</div>
	</div>
  </section>
  

@endsection


