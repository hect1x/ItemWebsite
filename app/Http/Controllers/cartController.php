<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function addCart(Request $request, $id){
        $user = auth()->user();
        $item = Item::find($id);
        $cart = new Cart;

        $cart->user_id = $user->id;
        $cart->item_name = $item->name;
        $cart->total_quantity = $request->quantity;
        $cart->total_price = $request->quantity * $item->price;
        $cart->save();
        return redirect('/');
    }

    public function myCart(){
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->get();
    
        $totalPrice = 0;
        foreach ($cart as $carts) {
            $totalPrice += $carts->total_price;
        }
    
        return view('myCart', [
            'title' => 'My Cart',
            'cart' => $cart,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function deleteCart($id){
        $toDelete = Cart::find($id);
        $toDelete->delete();
        return redirect()->back();
    }

    public function checkout(Request $request){
        $request->validate([
            'address' => 'required|min:10|max:100',
            'postal' => 'required|numeric|digits_between:5,5'
        ]);
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->get();
    
        $totalPrice = 0;
        foreach ($cart as $carts) {
            $totalPrice += $carts->total_price;
        }
        
        Order::create([
            'address' => $request->address,
            'postal' => $request->postal,
            'total' => $totalPrice
        ]);

        DB::table('carts')->where('user_id',$user->id)->delete();
        return redirect('/');
    }

}
