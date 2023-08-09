<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $orders = Order::all();
        if (!$orders->isEmpty()) {
            $orders = Order::where("user_id", Auth()->user()->id)->get();
            $products = collect(); 
            foreach($orders as $order){
                $products->push(Product::find(json_decode($order->product_list)));
            }
            //dump($products);
            return view('order', compact('orders','products'));
        } else {    
            return view('order', compact('orders'));
        }
    }

    public function showNew()
    {
        $orders = Order::all();
        if (!$orders->isEmpty()) {
            $orders = Order::where("user_id", Auth()->user()->id)->get();
            $products = Product::select("*");
            return view('order', compact('orders','products'));
        } else {    
            return view('order', compact('orders'));
        }
    }

}