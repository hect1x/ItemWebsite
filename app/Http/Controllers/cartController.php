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

        $beforeCart = Cart::where('user_id', $user->id)->where('item_name', $item->name)->first();


        if($item->quantity == 0){
            return redirect()->back()->with('Fail0', 'Item is out of stock');
        }
        if($item->quantity < $request->quantity){
            return redirect()->back()->with('Fail1', 'Stock not enough to satisfy request');
        }
        if($beforeCart){
            if($beforeCart->total_quantity + $request->quantity > $item->quantity){
                return redirect()->back()->with('Fail2', 'The requested quantity and those in your current cart exceeds the available stock.');
            }
            $newQuantity = $beforeCart->total_quantity + $request->quantity;
            $beforeCart->total_quantity = $newQuantity;
            $beforeCart->total_price = $newQuantity * $item->price;
            $beforeCart->save();
            return redirect('/');
        }

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
            'postal' => 'required|numeric|digits:5'
        ]);
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->get();
    
        $totalPrice = 0;
        foreach ($cart as $carts) {
            $item = Item::where('name', $carts->item_name)->first();
            $item->update([
                'quantity' => $item->quantity - $carts->total_quantity
            ]);
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
