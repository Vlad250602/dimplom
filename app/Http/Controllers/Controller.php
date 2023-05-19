<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function order_products(){
        $user_id = Auth::user()->id;
        $order = Order::where('user_id' ,$user_id)->where('status', 'new')->first();
        if (!$order){
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

        $products = DB::table('products')
            ->select('product_name','price','size', DB::raw('count(product_id) as count'))
            ->rightJoin('order_items','products.id', '=', 'product_id')
            ->where('order_id', $order->id)
            ->groupBy('product_name','price','size')
            ->get();
        return $products;
    }

    public function order_total(){
        $user_id = Auth::user()->id;
        $order = Order::where('user_id' ,$user_id)->where('status', 'new')->first();
        $total = DB::table('products')
            ->select('price')
            ->rightJoin('order_items','products.id', '=', 'product_id')
            ->where('order_id', $order->id)
            ->get();
        return $total;
    }
}
