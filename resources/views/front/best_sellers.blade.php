@forelse ($best_sellers as $best_seller)    
    <div class="owl-item product_slider_item">
        <a href="{{ url('/product/'. $best_seller->id) }}">
            <div class="product-item women">
                <div class="product">
                    <div class="product_image">
                        <img src="{{ $best_seller->image_url }}" alt="">
                    </div>                
                    
                    @if ($best_seller->label_type == 'RED')                        
                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>{{ $best_seller->special_label }}</span></div>
                    @endif

                    @if ($best_seller->label_type == 'GREEN')                        
                        <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>{{ $best_seller->special_label }}</span></div>
                    @endif

                    <div class="product_info">
                        <h6 class="product_name">{{ $best_seller->name }}</h6>
                        <div class="product_price">₹{{ $best_seller->price }}<span style="color: #000">₹{{ $best_seller->price_display }}</span></div>
                    </div>                
                </div>
            </div>
        </a>
    </div>
@empty
    <div>No products available</div>
@endforelse