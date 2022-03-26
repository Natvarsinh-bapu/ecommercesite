@extends('layouts/main')

@section('content')
    {{-- shop --}}

    <div class="new_arrivals shop-title-div">
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
                    <div style="display: flex;justify-content:center;margin-top:50px;">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection