	{{-- Top Navigation --}}

    <div class="top_nav">
        <div class="container">            
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">free shipping on all gandhinagar orders over <span style="font-family: initial !important">₹</span> 500</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">

                            {{-- Currency / Language / My Account --}}

                            {{-- <li class="currency">
                                <a href="#">
                                    usd
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="currency_selection">
                                    <li><a href="#">cad</a></li>
                                    <li><a href="#">aud</a></li>
                                    <li><a href="#">eur</a></li>
                                    <li><a href="#">gbp</a></li>
                                </ul>
                            </li> --}}

                            {{-- <li class="language">
                                <a href="#">
                                    English
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="language_selection">
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Italian</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li> --}}

                            <li class="account">
                                <a href="#">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="account_selection">
                                    @if (Auth::user())
                                        <li><a href="{{ url('/my-profile') }}"><i class="fa fa-user" aria-hidden="true"></i>My profile</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                        <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
                                            </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                        <li><a href="{{ url('/register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                    @endif                                    
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Navigation --}}

    <div class="main_nav_container">
        <div class="container">

            {{-- alerts --}}
            @if (Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            @if (Session::has('error_message'))
                <div class="alert alert-danger">
                    {{ Session::get('error_message') }}
                </div>
            @endif
            <div id="custom_alert_parent">
                {{-- dynamic alert append here --}}
            </div>
            {{-- alerts end --}}

            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">                        
                        <div>
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
                            </a>
                        </div>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li>
                                {{-- <div style="display: flex;text-align:center;">
                                    {!! Form::text('search', '', array('placeholder' => 'Search', 'class' => 'form-control')) !!}
                                    {!! Form::submit('Search', array('class' => 'custom-btn outline-custom-btn btn-sm ml-2')) !!}
                                </div> --}}
                            </li>
                            <li><a href="{{ url('/') }}">home</a></li>
                            <li><a href="{{ url('/shop') }}">shop</a></li>
                            @if (Auth::user())
                                <li><a href="{{ url('/my-orders') }}">My orders</a></li>
                            @endif
                        </ul>
                        <ul class="navbar_user">
                            {{-- <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li> --}}
                            {{-- <li><a href="#" title="My profile"><i class="fa fa-user" aria-hidden="true"></i></a></li> --}}
                            <li class="checkout">
                                <a href="{{ url('/cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items _cart_item_count">{{ cart_item_count() }}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="fs_menu_overlay"></div>
    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="hamburger_menu_content text-right">
            <ul class="menu_top_nav">
                @if (Auth::user())
                    <li class="menu_item"><a href="{{ url('/my-profile') }}">My Profile</a></li>                    
                @else
                    <li class="menu_item"><a href="{{ url('/login') }}">Login</a></li>
                    <li class="menu_item"><a href="{{ url('/register') }}">Register</a></li>
                @endif
                <li class="menu_item"><a href="{{ url('/') }}">Home</a></li>
                <li class="menu_item"><a href="{{ url('/shop') }}">Shop</a></li>                
                @if (Auth::user())
                    <li class="menu_item"><a href="{{ url('/my-orders') }}">My orders</a></li>
                    <li class="menu_item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>                
                @endif
            </ul>
        </div>
    </div>