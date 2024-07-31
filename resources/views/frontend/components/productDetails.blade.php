
<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					
					<li class="active">Product Details</li>
				</ol>
			</div>
			
		</div>
		<div class="row mt-20">
			<div class="col-md-5">
				<div>
					<div>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div>

								<div>
									<img src="{{ asset('/public/uploads/' . $details->image) }}" alt='' data-zoom-image="images/shop/single-products/product-1.jpg" />
								</div>

							</div>
							
						
						</div>
						
						
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details">
					<h2>{{ $details->name }}</h2>
					<p class="product-price">{{ $details->price }} Tk</p>
					
					<p class="product-description mt-20">
						{!!($details->product_information)!!}
					</p>
					
					
					
					<div class="product-quantity">
						<span>Quantity: {{ $details->stock }}</span>
						
					</div>
					
					<a href="{{route('add.to.cart',$details->id)}}" class="btn btn-main mt-20">Add To Cart</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="tabCommon mt-20">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
						
					</ul>
					<div class="tab-content patternbg">
						<div id="details" class="tab-pane fade active in">
							<h4>Product Description</h4>
							<p>{!!($details->product_information)!!}</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>