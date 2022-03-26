<?php

use Carbon\Carbon;

//label types
if (!function_exists('label_type_list')) {
    function label_type_list()
    {
        return [
            '' => 'Please select',
            'RED' => 'RED',
            'GREEN' => 'GREEN',
        ];
    }
}

//return default image url
if (!function_exists('default_image_url')) {
    function default_image_url()
    {
        return url('/') . '/images/default.png';
    }
}

//order status
if (!function_exists('order_status')) {
    function order_status()
    {
        return [
            'Cancelled' => 'Cancelled',
            'Shipped' => 'Shipped',
            'Delivered' => 'Delivered'
        ];
    }
}

//cancel order button
if (!function_exists('cancel_order_button')) {
    function cancel_order_button($date)
    {
        $now = Carbon::now();
        $order_date = Carbon::parse($date)->addHours(24);

        if($now->gt($order_date)){
            return false;
        } else {
            return true;
        }        
    }
}
