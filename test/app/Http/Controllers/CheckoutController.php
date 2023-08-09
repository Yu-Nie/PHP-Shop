<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    protected $orderRepository;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout(Request $request)
    {
        $total_price = $request->input('total_price');
        $product_list = $request->input('product_list');
        return view('checkout', compact('total_price', 'product_list'));
    }

    public function placeOrder(Request $request)
    {
        //dump($request->input("product_list"));
        $data=array("name"=>$request->input('name'),
                    "address"=>$request->input('address'),
                    "phone"=>$request->input('phone'),
                    "email"=>$request->input('email'),
                    "total_price"=>$request->input('total_price'),
                    "user_id"=>Auth()->user()->id,
                    "product_list"=>$request->input("product_list"));
        Order::insert($data);
        
        $order = Order::where("user_id", Auth()->user()->id)->orderBy('order_number','desc')->first();

        $cart = Cart::where('user_id',Auth()->user()->id)->get();
        $cart->each->delete();

        $products = Product::find(json_decode($order->product_list));

        
        return view('newOrder', compact('order', 'products'));
  }
}