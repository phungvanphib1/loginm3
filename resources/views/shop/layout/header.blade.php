<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<i class="tf-ion-ios-telephone"></i>
					<span>0129- 12323-123123</span>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->

                {{-- .top-nav {
                    background-image: url('https://scontent.fhan2-1.fna.fbcdn.net/v/t1.15752-9/304990596_493728899340460_2130836465473148598_n.png?_nc_cat=101&ccb=1-7&_nc_sid=ae9488&_nc_ohc=PaAzc9yOCiwAX8OlgMs&_nc_ht=scontent.fhan2-1.fna&oh=03_AdQ8r7vcS4POOb9pAicmH_yRaiW8q-3aONrF21HXrV0Srg&oe=63753980');
                    background-size: cover;
                } --}}

				<div class="logo text-center">
					<a href="{{route('shop.index')}}">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="AVIATO">
										<tspan x="108.94" y="325"></tspan>
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
							{{-- <div class="media">
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
							</div> --}}
                            <!-- / Cart Item -->

							{{-- <div class="cart-summary">
								<span>Total</span>
								<span class="total-price">$1799.00</span>
							</div> --}}
                            @if (isset(Auth()->guard('customers')->user()->name))
                            <form method="POST" action="{{ route('shoplogout') }}">
                                @csrf
                            <a  href="#"onclick="event.preventDefault();
                            this.closest('form').submit();"> {{Auth()->guard('customers')->user()->name }}: <i class="fa fa-key"></i>????ng xu???t</a>
                            </form>
                            @endif

							<ul class="text-center cart-buttons">
								<li><a href="{{route('shop.cart')}}" class="btn btn-small">Gi??? H??ng</a></li>
								<li><a href="{{route('checkOuts')}}" class="btn btn-small btn-solid-border">Thanh To??n</a></li>
							</ul>

                            {{-- {{ auth()->customers()->name }} --}}
						</div>

					</li><!-- / Cart -->


					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						{{-- <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Search</a> --}}
						<ul class="dropdown-menu search-dropdown">
							<li>
								<form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
							</li>
						</ul>
					</li><!-- / Search -->

					<!-- Languages -->
                        {{-- <li class="commonSelect">
                            <select class="form-control">
                                <option>EN</option>
                                <option>DE</option>
                                <option>FR</option>
                                <option>ES</option>
                            </select>
                        </li> --}}
                    <!-- / Languages -->

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section>
