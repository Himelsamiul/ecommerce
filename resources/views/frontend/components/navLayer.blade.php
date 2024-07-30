{{-- 
<!-- Header Section start -->
        <header class="header header--one">
            <div class="header__top">
                <div class="container">
                    <div class="header__top-content">
                        <div class="header__top-left">
                            <p class="font-body--sm">
                                
                                Store Location: Online
                            </p>
                        </div>
                        <div class="header__top-right">
                           
                            <div class="header__in">
                                @auth
                                @if (auth()->user()->role == 'customer')
                                    <a href="{{ route('logout') }}"><i class="fa fa-user"></i> Logout</a>
                                @endif
                            @endauth


                            @auth
                            @else
                                <a href="{{ route('login.frontend') }}"><i class="fa fa-user"></i> Sign in</a>
                            @endauth

                               
                                <span>/</span>
                                
                                @guest
                                <a href="{{ route('registration') }}">
                                    <div>Registration</div>
                                </a>
                            @endguest

                            @auth
                                @if (auth()->user()->role == 'customer')
                                    <a href="{{ url('/profile') }}">
                                        <div>Profile</div>
                                    </a>
                                @endif
                            @endauth
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="header__center">
                <div class="container">
                    <div class="header__center-content">
                        <div class="header__brand">
                            <button class="header__sidebar-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 12H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M3 6H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M3 18H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            @php
                            $logo = App\Models\CompanyLogo::latest()->first();
                            @endphp
                            <div>
                                @if($logo)
                                <a href="{{ route('home') }}"><img src="{{url('/public/uploads/', $logo->image)}}" alt=""></a>
                                @else
                                    <a href="{{ route('home') }}">Inseart a logo</a>
                                 @endif
                            </div>
                        </div>
                        <form action="{{ route('user.search') }}">
                            @csrf
                            <div class="header__input-form">
                              
       
                                    <input type="text"  name="search_key"  placeholder="What do you need?">
                                    
                                <span class="search-icon">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.16667 16.3333C12.8486 16.3333 15.8333 13.3486 15.8333 9.66667C15.8333 5.98477 12.8486 3 9.16667 3C5.48477 3 2.5 5.98477 2.5 9.66667C2.5 13.3486 5.48477 16.3333 9.16667 16.3333Z"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path d="M17.4999 18L13.8749 14.375" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <button type="submit" class="search-btn button button--md">
                                    Search
                                </button>
                            </div>
                        </form>
                        <div class="header__cart">
                            <div class="header__cart-item">
                               

                                <a class="fav" href="{{ route('wishlist.index') }}">
                                    <button class="btn btn-black">
                                        <svg width="25" height="23" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.9996 16.5451C-6.66672 7.3333 4.99993 -2.6667 9.9996 3.65668C14.9999 -2.6667 26.6666 7.3333 9.9996 16.5451Z" stroke="#1A1A1A" stroke-width="1.5" />
                                        </svg>
                                        @auth
                                            <span class="wishlist-count">{{ Auth::user()->wishlistProducts->count() }}</span>
                                        @else
                                            <span class="wishlist-count">0</span>
                                        @endauth
                                    </button>
                                </a>
                            </div>
                            <div class="header__cart-item">
                                <div class="header__cart-item-content" id="cart-bag">
                                    <a href="{{ url('/view-cart') }}" class="cart-bag">
                                        <svg width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.3333 14.6667H7.08333L4.25 30.25H29.75L26.9167 14.6667H22.6667M11.3333 14.6667V10.4167C11.3333 7.28705 13.8704 4.75 17 4.75V4.75C20.1296 4.75 22.6667 7.28705 22.6667 10.4167V14.6667M11.3333 14.6667H22.6667M11.3333 14.6667V18.9167M22.6667 14.6667V18.9167"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                        
                                    </a>
                                    <div class="header__cart-item-content-info">
                                    

                                        <li>
                                            <a href="{{ url('/view-cart') }}">
                                                <span class="cart-count">{{ session()->has('cart') ? count(session()->get('cart')) : 0 }}</span>
                                            </a>
                                        </li>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__bottom">
                <div class="container">
                    <div class="header__bottom-content">
                        <ul class="header__navigation-menu">
                            <!-- Homepages -->
                            <li class="header__navigation-menu-link">
                                <a href="{{ route('home') }}">
                                    Home
                                   
                                </a>
                                
                            </li>
                            <!-- Shopepages -->
                            <li class="header__navigation-menu-link">
                                <a href="{{ url('/product') }}">
                                    Products
                                    
                                </a>
                            
                            </li>
                            
                            <li class="header__navigation-menu-link">
                                <a href="about.html">About us </a>
                            </li>
                            <li class="header__navigation-menu-link">
                                <a href="{{ url('/contact') }}">Contact us</a>
                            </li>
                        </ul>

                        
                    </div>
                </div>
            </div>
            <div class="header__sidebar">
                <button class="header__cross">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="header__mobile-sidebar">
                    <div class="header__mobile-top">
                        <form action="#">
                            <div class="header__mobile-input">
                                <input type="text" placeholder="Search" />
                                <button class="search-btn">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.16667 16.3333C12.8486 16.3333 15.8333 13.3486 15.8333 9.66667C15.8333 5.98477 12.8486 3 9.16667 3C5.48477 3 2.5 5.98477 2.5 9.66667C2.5 13.3486 5.48477 16.3333 9.16667 16.3333Z"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path d="M17.4999 18L13.8749 14.375" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                       
                    </div>
                   
                </div>
            </div>
        </header>
        <!-- Header  Section start --> --}}



        <!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<i class="tf-ion-ios-telephone"></i>
					<span>019585555555</span>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="{{ route('home') }}">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="AVIATO">
										<tspan x="108.94" y="325">AVIATO</tspan>
									</text>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-android-cart"></i>Cart</a>
						<div class="dropdown-menu cart-dropdown">
							<!-- Cart Item -->
							<div class="media">
								<a class="pull-left" href="#!">
									<img class="media-object" src="images/shop/cart/cart-1.jpg" alt="image" />
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#!">Ladies Bag</a></h4>
									<div class="cart-price">
										<span>1 x</span>
										<span>1250.00</span>
									</div>
									<h5><strong>$1200</strong></h5>
								</div>
								<a href="#!" class="remove"><i class="tf-ion-close"></i></a>
							</div><!-- / Cart Item -->
							<!-- Cart Item -->
							<div class="media">
								<a class="pull-left" href="#!">
									<img class="media-object" src="images/shop/cart/cart-2.jpg" alt="image" />
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#!">Ladies Bag</a></h4>
									<div class="cart-price">
										<span>1 x</span>
										<span>1250.00</span>
									</div>
									<h5><strong>$1200</strong></h5>
								</div>
								<a href="#!" class="remove"><i class="tf-ion-close"></i></a>
							</div><!-- / Cart Item -->

							<div class="cart-summary">
								<span>Total</span>
								<span class="total-price">$1799.00</span>
							</div>
							<ul class="text-center cart-buttons">
								<li><a href="cart.html" class="btn btn-small">View Cart</a></li>
								<li><a href="checkout.html" class="btn btn-small btn-solid-border">Checkout</a></li>
							</ul>
						</div>

					</li><!-- / Cart -->

					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Search</a>
						<ul class="dropdown-menu search-dropdown">
							<li>
								<form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
							</li>
						</ul>
					</li><!-- / Search -->

					

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="{{ route('home') }}">Home</a>
					</li><!-- / Home -->


					<!-- Elements -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Shop <span
								></span></a>
						
					</li><!-- / Elements -->


					<!-- Pages -->
					<li class="dropdown full-width dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Contact us <span
								></span></a>
						
					</li><!-- / Pages -->




                    @auth
                    @if (auth()->user()->role == 'customer')
                        <li class="dropdown dropdown-slide">
                            <a href="{{ route('logout') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                                role="button" aria-haspopup="true" aria-expanded="false"><b style="color: red">Logout</b> <span
                                    ></span></a>
                        
                        </li>
                    @endif
                    @endauth


                    @auth
                    @else
                      
                        <li class="dropdown dropdown-slide">
                            <a href="{{ route('login.frontend') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                                role="button" aria-haspopup="true" aria-expanded="false"><b>Login</b> <span
                                    ></span></a>
                        
                        </li>
                    @endauth

                   
                 
                    
                    @guest
                    
                    <li class="dropdown dropdown-slide">
						<a href="{{ route('registration') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false"><b style="color: rgb(3, 3, 39)">Registration</b> <span
								></span></a>
					
					</li>
                @endguest

                @auth
                    @if (auth()->user()->role == 'customer')
                    

                        <li class="dropdown dropdown-slide">
                            <a href="{{ url('/profile') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                                role="button" aria-haspopup="true" aria-expanded="false"><b style="color: rgb(5, 63, 13)">Profile</b> <span
                                    ></span></a>
                        
                        </li>
                    @endif
                @endauth
					
				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>