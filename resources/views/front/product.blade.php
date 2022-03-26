@forelse ($products as $item)
    <div class="product-item" style="cursor: default;">
        <div class="product discount">
            <a href="{{ url('/product/'.$item->id) }}">
                <div class="product_image">
                    <img src="{{ $item->image_url }}" alt="">
                </div>
                            
                @if ($item->label_type == 'RED')
                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>{{ $item->special_label }}</span></div>
                @endif

                @if ($item->label_type == 'GREEN')
                    <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>{{ $item->special_label }}</span></div>
                @endif

                <div class="product_info">
                    <h6 class="product_name">{{ $item->name }}</h6>
                    <div class="product_price">₹{{ $item->price }}<span style="color: #000">₹{{ $item->price_display }}</span></div>
                </div>
            </a>

            <div class="product_info">
                <div class="product_price p-2">
                    <button data-id="{{ $item->id }}" type="button" class="mb-2 cursor-pointer btn btn-outline-warning btn-sm _add_to_cart" style="width: 100%">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        Add to cart
                    </button>                                        
                    {{ Form::open(array('url' => '/buy-now', 'method' => 'POST')) }}
                        @csrf
                        {{ Form::hidden('product_id', $item->id) }}
                        <button type="submit" class="cursor-pointer btn btn-outline-success btn-sm" style="width: 100%">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            Buy now
                        </button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>    
@empty
    <div>
        No products available
    </div>
@endforelse 