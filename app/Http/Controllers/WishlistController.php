<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function index(){
        if(!Auth::user()){
            return redirect()->route('login');
        }
        $products = $this->order_products();
        $total = $this->order_total();
        $user_id = Auth::user()->id;

        $wishlist = DB::table('products')
            ->select('*', 'products.id as product_id')
            ->rightJoin('wishlists', 'wishlists.product_id', '=', 'products.id')
            ->where('wishlists.user_id', '=', $user_id)->get();

        return view('wishlist',['products' => $products, 'total' => $total, 'wishlist' => $wishlist]);
    }

    public function add(Request $request, $id){

        $items = Product::where('id', '>', '100')->get();

        foreach ($items as $item) {
            $item->description = 'Plastic legs included. Delivery within 3-7 days.';
            $item->save();
        }


        if(!Auth::user()){
            return redirect()->route('login');
        }

        $user_id = Auth::user()->id;

        $temp = Wishlist::where('user_id', '=', $user_id)->where('product_id', '=', $id)->first();
        if ($temp){
            return redirect()->route('wishlist');
        }

        $item = new Wishlist();
        $item->user_id = $user_id;
        $item->product_id = $id;

        $item->save();


        return redirect()->route('wishlist');

    }

    public function remove(Request $request, $id){
        $item = Wishlist::where('id', '=', $id)->first();
        $item->delete();

        return redirect()->route('wishlist');
    }
}
