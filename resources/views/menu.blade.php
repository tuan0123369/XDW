<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ url('/') }}"><img src="User/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('category') }}">Shop</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('blog') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contact</a>
                        </li>

                        @if (Session::get('logged'))
                            @if (Session::get('user_role') == 1)
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('ad_index') }}">Manage</a></li>
                            @endif

                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">{{ Session::get('user_name') }}</a>
                                <img src="img/avatar/{{ Session::get('user_avatar') }}"
                                    style="width: 50px; height: 50px">
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ url('user_detail') }}">Profile</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ url('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a>
                            </li>
                        @endif
                        {{-- @if (Auth::check())
								<li class="nav-item"><a class="nav-link" href="{{ url('user_detail') }}">{{Auth::user()->user_name}}</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('logout') }}">Logout</a></li>
						@else
						<li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
						@endif --}}
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{ url('cart') }}" class="cart">
                                <h4><span class="ti-bag" id="cartItem">
                                        @php
                                            if (Session::get('cartItem')) {
                                                echo count(Session('cartItem'));
                                            }
                                        @endphp
                                    </span></h4>
                            </a></li>
                        {{-- <li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    {{-- <div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" name="key" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div> --}}
</header>
