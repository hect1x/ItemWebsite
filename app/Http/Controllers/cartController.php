<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\UserItem;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function addToCart(Item $item){
        return view('addToCart',[
            'title' => 'Adding to Cart',
            'item' => $item,
        ]);
    }

    public function updateCart(Item $item, Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer',
        ]);

        $user = Auth::user();
        DB::table('users_items')->insert([
            'item_id' => $item->id,
            'user_id' => $user->id,
            'item_quantity' => $request->quantity,
            'total_price' => $request->quantity * $item->price,
        ]);

        return redirect('/myitems');
    }
    public function myCart(Item $item)
    {
        $user = Auth::user();
        $userItems = $user->items;
        return view('myCart',[
            'title' => 'My Cart',
            'userItems' => $userItems
        ]);
    }
    public function removeItem($itemId)
    {
        $item = Item::find($itemId);

        if ($item) {
            // Assuming $user is the user related to the item, adjust this based on your code
            $user = auth()->user(); // Replace with your actual user retrieval logic

            // Detach the item from the pivot table
            $user->items()->detach($item->id);

            return redirect()->back()->with('success', 'Item removed successfully.');
        }

        return redirect()->back()->with('error', 'Item not found.');
    }
}
