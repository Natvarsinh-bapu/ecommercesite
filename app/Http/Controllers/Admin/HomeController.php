<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Orders;
use App\OrdersList;
use Carbon\Carbon;

class HomeController extends Controller
{

    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $today = Carbon::today()->format('Y-m-d');    
        $category_count = Category::count();
        $product_count = Product::count();
        $orders_count = OrdersList::count();
        $orders_count_today = OrdersList::whereDate('created_at', '=', Carbon::today()->toDateString())->count();

        return view('admin.home', compact('category_count', 'product_count', 'orders_count', 'orders_count_today'));
    }

}
