<?php

namespace App\Http\Controllers;

use App\Models\Order_items;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $products = $this->order_products();
        $total = $this->order_total();

        return view('cart',['products' => $products, 'total' => $total]);
    }

    public function add(Request $request, $id)
    {
        if(!Auth::user()){
            return redirect()->route('login');
        }
        $user_id = Auth::user()->id;
        $product = Product::where('id', $id)->first();
        $orders = Order::where('user_id' ,$user_id)->where('status', 'new')->get();
        if ($orders->count() == 0){
            $order = new Order();
            $order->status = 'new';
            $order->user_id = $user_id;
            $order->country = '';
            $order->town = '';
            $order->address = '';
            $order->pay_type = '';
            $order->description = '';

            $order->save();

        }
        $order = Order::where('user_id' ,$user_id)->where('status', 'new')->first();
        /*$order_items = new Order_items();
        $order_items->order_id = $order->id;
        $order_items->product_id = $id;*/

        $countOfProductInCart = DB::table('products')
            ->select('products.id','count', DB::raw('count(products.id) as count_in_cart'))
            ->leftJoin('order_items','products.id', '=', 'product_id')
            ->where('order_id', $order->id)
            ->where('products.id', $id)
            ->groupBy('products.id','count')
            ->first();

        if (!$countOfProductInCart){
            $countInCart = 0;
        } else {
            $countInCart = $countOfProductInCart->count_in_cart;
        }


        if(($product->count - $countInCart - 1) < 0){
            return redirect()->route('main');
        }
        DB::insert('insert into order_items (order_id, product_id, price_stamp) values (?, ?, ?)', [$order->id, $id, $product->price]);
        //$order_items->save();

        return redirect()->route('cart');
    }

    public function checkout(){
        $products = $this->order_products();
        $total = $this->order_total();

        return view('checkout',['products' => $products, 'total' => $total]);
    }

    public function checkout_submit(Request $request){

        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'town' => 'required',
            'address' => 'required',
            'country' => 'required',
            'pay_type' => 'required'
        ]);

        $user_id = Auth::user()->id;
        $order = Order::where('user_id' ,$user_id)->where('status', 'new')->first();

        $cartProducts = DB::table('products')
            ->select('products.id as prod_id', 'count', DB::raw('count(products.id) as count_in_cart'))
            ->leftJoin('order_items','product_id', '=', 'products.id')
            ->where('order_id', $order->id)
            ->groupBy('products.id', 'count')
            ->get();

        foreach ($cartProducts as $cartProduct){
            if($cartProduct->count - $cartProduct->count_in_cart < 0){
                return redirect()->route('cart');
            }
        }

        foreach ($cartProducts as $cartProduct){
            $product = Product::where('id', $cartProduct->prod_id)->first();
            $product->count = $cartProduct->count - $cartProduct->count_in_cart;
            $product->save();
        }

        $order->name = $request->name;
        $order->surname = $request->surname;
        $order->country = $request->country;
        $order->town = $request->town;
        $order->address = $request->address;
        $order->pay_type = $request->pay_type;
        $order->status = 'processed';
        $order->created_at = now();

        $order->save();

        return redirect()->route('main');
    }

}
