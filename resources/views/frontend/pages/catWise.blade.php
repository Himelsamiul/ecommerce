@extends('frontend.master')

@section('content')
<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Product</h2>
                </div>
                <div class="featured__controls">
                    <!-- Category controls can be added here if needed -->
                </div>
            </div>
        </div>

        @if($products->isEmpty())
            <!-- Display message when no products are available -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 style="color: red;">NO PRODUCT FOUND</h3>
                    <p>Choose another category.</p>
                </div>
            </div>
        @else
            <div class="row featured__filter">
                @foreach ($products as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic">
                            <a href="{{ url('/product-details', $item->id) }}"> 
                                <img src="{{ asset('/public/uploads/' . $item->image) }}" alt="Product Image">
                            </a>
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="{{ url('/product-details', $item->id) }}"><i class="fa fa-eye"></i></a></li>
                                <li><a href="{{ route('add.to.cart', $item->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ $item->name }}</a></h6>
                            <h5 style="color: rgb(214, 57, 17)">{{ $item->price }} Tk.</h5>
                        </div>
                        <br>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

    </div>
</section>
<!-- Featured Section End -->

@endsection
