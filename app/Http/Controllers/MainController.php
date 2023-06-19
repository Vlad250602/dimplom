<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $sliders = DB::table('sliders')->select('sliders.description as slider_desc', 'sliders.image as slider_image','sliders.id as slider_id', 'products.*')
            ->leftJoin('products', 'sliders.product_id', '=', 'products.id')
            ->where('sliders.status', '=', 'active')->get();

        $best_sellers = DB::table('products')->select('*')->orderBy('total_sales', 'DESC')->limit(20)->get();
        $new_arrivals = DB::table('products')->select('*')->orderBy('created_at', 'DESC')->limit(8)->get();

        if(!Auth::user()){
            return view('index', ['sliders' => $sliders, 'best_sellers' => $best_sellers, 'new_arrivals' => $new_arrivals]);
        }

        $products = $this->order_products();
        $total = $this->order_total();

        return view('index', ['total' => $total , 'products' => $products, 'sliders' => $sliders, 'best_sellers' => $best_sellers, 'new_arrivals' => $new_arrivals]);
    }

    public function contact(){
        if(!Auth::user()){
            return view('contact');
        }

        $products = $this->order_products();
        $total = $this->order_total();

        return view('contact', ['total' => $total , 'products' => $products]);
    }
}
