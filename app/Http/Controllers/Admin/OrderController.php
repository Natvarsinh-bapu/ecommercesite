<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Orders;
use App\OrdersList;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrdersList::has('orders')->latest()->paginate(10);

        return view('admin.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = OrdersList::with('orders.product')->where('order_id', $id)->first();

        $total_amount = '0.00';        
        if($order){
            foreach ($order->orders as $ord) {                
                $total_amount = ($total_amount+$ord->product->price);
            }
        }

        return view('admin.order.show', compact('order', 'total_amount'));
    }
}
