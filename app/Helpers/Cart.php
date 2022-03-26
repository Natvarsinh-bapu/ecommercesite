<?php

//cart item count
if (!function_exists('cart_item_count')) {
    function cart_item_count()
    {        
        $cart_ids = session()->get('cart');

        if($cart_ids == null){
            $cart_ids = [];
        }

        return count($cart_ids);
    }
}

//add item to cart
if (!function_exists('add_item_in_cart')) {
    function add_item_in_cart($id)
    {        
        $cart_ids = session()->get('cart');

        if($cart_ids == null){
            $cart_ids = [];
        }

        array_push($cart_ids, $id);

        session()->put('cart', $cart_ids);

        return $cart_ids;
    }
}

//remove item from cart
if (!function_exists('remove_item_from_cart')) {
    function remove_item_from_cart($id)
    {        
        $cart_ids = session()->get('cart');

        array_splice($cart_ids, array_search($id, $cart_ids), 1);

        if(count($cart_ids) > 0){
            session()->put('cart', $cart_ids);
        } else {
            session()->forget('cart');
        }

        return true;
    }
}
