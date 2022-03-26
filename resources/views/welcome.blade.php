@extends('layouts.main')

@section('content')
    {{-- Slider --}}

    <div class="main_slider" style="background-image:url({{ asset('theme/images/slider_1.jpg') }})">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h6>Popular Collection {{ \Carbon\Carbon::now()->format('Y') }}</h6>
                        <h1>Get up to 30% Off New Arrivals</h1>
                        <div class="red_button shop_now_button">
                            <a href="{{ url('/shop') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                shop now
                            </a>
                        </div> 
                    </div>  
                </div>
            </div>
        </div>
    </div>

    {{-- Banner --}}

    <div class="banner" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url({{ asset('theme/images/banner_1.jpg') }})">
                        <div class="banner_category">
                            <a href="#">women's</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url({{ asset('theme/images/banner_2.jpg') }})">
                        <div class="banner_category">
                            <a href="#">accessories's</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url({{ asset('theme/images/banner_3.jpg') }})">
                        <div class="banner_category">
                            <a href="#">men's</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- New Arrivals --}}

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <a href="{{ url('/shop') }}">
                                <li class="custom-btn outline-custom-btn justify-content-center align-items-center active is-checked {{ request()->category == "" ? 'category-active' : ''}}">ALL</li>
                            </a>
                            @forelse ($categories as $category)
                                <a href="{{ url('/shop?category='.$category->id) }}">
                                    <li class="custom-btn outline-custom-btn justify-content-center align-items-center {{ request()->category == $category->id ? 'category-active' : ''}}">
                                        {{ $category->name }}
                                    </li>
                                </a>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                        {{-- products --}}                         
                            @include('front.product')
                        {{-- products  end --}}                        
                    </div>

                </div>
            </div>
            <div class="row" style="justify-content: right;margin-top:10px;">
                <div>
                    <a class="custom-btn outline-custom-btn" href="{{ url('/shop') }}">Show more</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Deal of the week --}}

    <div class="deal_ofthe_week">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="deal_ofthe_week_img">
                        <img src="{{ asset('theme/images/deal_ofthe_week.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Deal Of The Week</h2>
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num">03</div>
                                <div class="timer_unit">Day</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num">15</div>
                                <div class="timer_unit">Hours</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num">45</div>
                                <div class="timer_unit">Mins</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num">23</div>
                                <div class="timer_unit">Sec</div>
                            </li>
                        </ul>
                        <div class="red_button deal_ofthe_week_button">
                            <a href="{{ url('/shop') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                shop now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Best Sellers --}}
    @if (!empty($best_sellers))
        <div class="best_sellers">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="section_title new_arrivals_title">
                            <h2>Best Sellers</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="product_slider_container">
                            <div class="owl-carousel owl-theme product_slider">
                                @include('front.best_sellers')
                            </div>

                            {{-- Slider Navigation --}}

                            <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </div>
                            <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Benefit --}}

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>free shipping</h6>
                            <p>Suffered Alteration in Some Form</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>cach on delivery</h6>
                            <p>The Internet Tend To Repeat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>15 days return</h6>
                            <p>Making it Look Like Readable</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>opening all week</h6>
                            <p>24 x 7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection