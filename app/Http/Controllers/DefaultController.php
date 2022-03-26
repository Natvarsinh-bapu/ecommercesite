<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cart;
use App\Orders;
use App\OrdersList;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Events\OrderPlaced;

class DefaultController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->latest()->paginate(10);
        $best_sellers = Product::where('best_seller', 1)->where('status', 1)->latest()->paginate(10);

        return view('welcome', compact('categories', 'products', 'best_sellers'));
    }

    public function shop(Request $request)
    {
        $categories = Category::where('status', 1)->get();

        if($request->category == null){
            $products = Product::where('status', 1)->latest()->paginate(10);
        } else {
            $products = Product::whereHas('categories', function($query) use ($request){
                $query->where('category_id', $request->category);
            })->where('status', 1)->latest()->paginate(10);            
        }

        return view('front.shop', compact('categories', 'products'));
    }

    public function productInfo($id)
    {
        $product = Product::with('images')->findOrFail($id);

        return view('front.product_info', compact('product'));
    }

    public function cart()
    {        
        $product_ids = session()->get('cart');

        $total_amount = '0.00';
        $products = [];
        if($product_ids != null){
            foreach ($product_ids as $product_id) {
                $product = Product::find($product_id);
                $total_amount = ($total_amount+$product->price);
                $products[] = $product;
            }
        }

        return view('front.cart', compact('products', 'total_amount'));
    }

    public function addToCart(Request $request)
    {
        $post = $request->all();

        add_item_in_cart($post['product_id']); //call helper function

        $user = Auth::user();
        if($user){
            $post['user_id'] = $user->id;
            Cart::create($post);
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $post = $request->all();

        remove_item_from_cart($post['product_id']); //call helper function

        $user = Auth::user();
        if($user){
            Cart::where('user_id', $user->id)->where('product_id', $post['product_id'])->delete();
        }
        
        return redirect('/cart')->with('success_message', 'Item removed from cart successfully');
    }

    public function buyNow(Request $request){
        $post = $request->all();

        add_item_in_cart($post['product_id']); //call helper function

        $user = Auth::user();
        if($user){
            $post['user_id'] = $user->id;
            Cart::create($post);
        }

        return redirect('/cart');
    }

    public function continueOrder(Request $request){
        $post = $request->all();

        $user = Auth::user();
        if($user){

        } else {
            return redirect('/user-login');
        }        

        return redirect('/order-summery');
    }

    public function orderSummery(){
        $product_ids = session()->get('cart');

        $total_amount = '0.00';
        $products = [];
        if($product_ids != null){
            foreach ($product_ids as $product_id) {
                $product = Product::find($product_id);
                $total_amount = ($total_amount+$product->price);
                $products[] = $product;
            }
        }

        return view('front.order_summery', compact('products', 'total_amount'));
    }

    public function placeOrder(Request $request){
        $post = $request->all();

        if($post['address'] == null){
            return redirect()->back()->with('address_error', "Please enter your address");
        }

        if($post['phone'] == null){
            return redirect()->back()->with('phone_error', "Please enter your mobile number");
        }

        $timestamp = Carbon::now()->timestamp;
        $order_id = "ORD".$timestamp;
        
        $user = Auth::user();
        if($user){
            if($user->address == null){
                $user->update([
                    'address' => $post['address']
                ]);
            }
            if($user->phone == null){
                $user->update([
                    'phone' => $post['phone']
                ]);
            }

            $product_ids = Cart::where('user_id', $user->id)->pluck('product_id');
            foreach ($product_ids as $product_id) {
                $product = Product::find($product_id);

                $order = [];
                $order['order_id'] = $order_id;
                $order['product_id'] = $product->id;
                $order['user_id'] = $user->id;
                $order['quantity'] = 1;
                $order['product_price'] = $product->price;
                $order['discount'] = "0.00";
                $order['tax'] = "0.00";
                $order['shipping_charge'] = "0.00";
                $order['product_price_total'] = $product->price;
                $order['address'] = $post['address'];
                $order['phone'] = $post['phone'];

                Orders::create($order);
            }
            Cart::where('user_id', $user->id)->delete();
            session()->forget('cart');
            $order_placed = OrdersList::create([
                'user_id' => $user->id,
                'order_id' => $order_id
            ]);

            $order_placed_data = OrdersList::with('user', 'orders')->find($order_placed->id);

            event(new OrderPlaced($order_placed_data));

            return redirect('/')->with('success_message', "Your order has been placed successfully");
        } else {
            return redirect('/')->with('error_message', "Something went wrong!");
        }

    }

    public function myOrders(){
        $user = Auth::user();

        if($user){
            $orders = OrdersList::has('orders')->where('user_id', $user->id)->latest()->paginate(10);

            return view('front.my_orders', compact('orders'));
        } else {
            return redirect('/login');
        }
    }

    public function orderShow($id){                
        $order = OrdersList::with('orders.product')->where('order_id', $id)->first();

        $total_amount = '0.00';        
        if($order){
            foreach ($order->orders as $ord) {                
                $total_amount = ($total_amount+$ord->product->price);
            }
        }

        return view('front.show_order', compact('order', 'total_amount'));
    }

    public function cancelOrder(Request $request){

        $post = $request->all();

        if($post['order_id'] == null){
            return redirect()->back()->with('error_message', "Something went wrong!");
        }

        $order = OrdersList::find($post['order_id']);

        if($order){
            $order->update([
                'status' => 'Cancelled'
            ]);
        }

        return redirect()->back()->with('success_message', "Order cancelled successfully");
    }
}
