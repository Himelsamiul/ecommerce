
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
					<li class="dropdown cart-nav ">
						<a href="{{ url('/view-cart') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-android-cart"></i>Cart</a><span class="cart-count">{{ session()->has('cart') ? count(session()->get('cart')) : 0 }}</span>
                               
						
					</li><!-- / Cart -->

                    <li class="dropdown cart-nav "> <a class="fav" href="{{ route('wishlist.index') }}">
                        <button class="btn btn-black">
                            Wishlist
                            @auth
                                <span class="wishlist-count">{{ Auth::user()->wishlistProducts->count() }}</span>
                            @else
                                <span class="wishlist-count">0</span>
                            @endauth
                        </button>
                    </a>
					</li><!-- / Cart -->
                    
					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Search</a>
						<ul class="dropdown-menu search-dropdown">
							<li>
								

                                <form action="{{ route('user.search') }}">
                                    @csrf
                                    <div class="header__input-form">
                                      
               
                                            <input type="text"  name="search_key"  placeholder="What do you need?">
                                            
                                        
                                        <button type="submit" class="search-btn button button--md">
                                            Search
                                        </button>
                                    </div>
                                </form>
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
						<a href="{{ url('/product') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Shop <span
								></span></a>
						
					</li><!-- / Elements -->


					<!-- Pages -->
					<li class="dropdown full-width dropdown-slide">
						<a href="{{ url('/contact') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
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