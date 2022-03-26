<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //login form
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user){
                session()->forget('cart');
                $product_ids = Cart::where('user_id', $user->id)->pluck('product_id');
                foreach ($product_ids as $product_id) {
                    add_item_in_cart($product_id); //call helper function
                }
            }

            return redirect('/');
        } else {
            return redirect('/login')->with('error', 'These credentials do not match our records.');
        }
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user){
                $cart_ids = session()->get('cart');
                foreach ($cart_ids as $cart_id) {
                    Cart::create([
                        'user_id' => $user->id,
                        'product_id' => $cart_id
                    ]);
                }
                session()->forget('cart');
                $product_ids = Cart::where('user_id', $user->id)->pluck('product_id');
                foreach ($product_ids as $product_id) {
                    add_item_in_cart($product_id); //call helper function
                }
            }

            return redirect('/order-summery');
        } else {
            return redirect('/login')->with('error', 'These credentials do not match our records.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
