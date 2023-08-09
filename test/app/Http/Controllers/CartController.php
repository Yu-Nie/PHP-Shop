<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use Flash;
use Auth;
use Session;

class CartController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    public function show()
    {
        $cart = Cart::all();
        if ($cart) {
            $cart = DB::table('products')
                    ->join('carts', 'products.id','=','carts.product_id')
                    ->select('products.id', 'products.name','products.price','products.picture','carts.quantity')
                    ->get();

        }   
        return view('cart', compact('cart'));
        
    }
    
    
    public function addProduct(Request $request)
     {
         $id = $request->input('id');
         $product = Cart::where('product_id',$id)->get();
         Session::flash('flash_product_name', $request->input('name'));

         if (!$product->isEmpty()) {
            Cart::where("product_id", $id)->update(['quantity'=>$product[0]->quantity + 1]);
            return redirect('products');
        } else {
            $user = Auth::user();
            $data=array("user_id"=>$user->id,"product_id"=>$id,"quantity"=>1);
            Cart::insert($data);
            return redirect('products');
        }
     }

    
    public function removeProduct(Request $request, $product_id)
    {
        $product = Cart::where('product_id',$product_id)->get();
        $product->each->delete();
        return redirect('cart');
    }

}