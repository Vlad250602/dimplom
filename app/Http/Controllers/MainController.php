<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if(!Auth::user()){
            return view('index');
        }
        $products = $this->order_products();
        $total = $this->order_total();
        return view('index', ['total' => $total , 'products' => $products]);
    }
}
