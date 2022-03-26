<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Cart;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

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
        } else {
            return redirect('/')->with('error_message', "Something went wrong!");
        }

        return redirect('/');
    }

    public function userRegister(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

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
        } else {
            return redirect('/')->with('error_message', "Something went wrong!");
        }

        return redirect('/order-summery');
    }
}
