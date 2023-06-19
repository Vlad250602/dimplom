<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminOrdersController extends Controller
{
    public function index()
    {
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        return view('admin-orders', ['data' => Order::where('status', '!=', 'new')->orderBy('status', 'ASC')->orderBy('created_at', 'DESC')->paginate(10), 'users' => User::all()]);
    }

    public function details($id){

        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $order = Order::where('id', $id)->first();
        $order_items = DB::table('products')
            ->select('products.*', 'price_stamp as price', DB::raw('count(products.id) as count'))
            ->rightJoin('order_items','products.id', '=', 'product_id')
            ->where('order_items.order_id','=',$id)
            ->groupBy('products.id', 'price_stamp')
            ->get();

        $items_no_group = DB::table('products')
            ->select('price_stamp as price')
            ->rightJoin('order_items','products.id', '=', 'product_id')
            ->where('order_items.order_id','=',$id)
            ->get();

        return view('admin-orders-details', ['order' => $order, 'items' => $order_items, 'total' => $items_no_group]);
    }

    public function complete($id){
        $order = Order::where('id', $id)->first();
        $order->status = 'completed';
        $order->save();

        return redirect()->route('admin-orders');
    }
}
