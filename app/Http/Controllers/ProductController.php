<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(isset($_GET['filter'])){
            if($_GET['filter'] === 'low_to_high'){
                $data = Product::orderBy('price', 'ASC')->paginate(15);
            } elseif($_GET['filter'] === 'high_to_low'){
                $data = Product::orderBy('price', 'DESC')->paginate(15);
            } elseif($_GET['filter'] === 'sales'){
                $data = Product::orderBy('total_sales', 'DESC')->paginate(15);
            } elseif($_GET['filter'] === 'title_a_z'){
                $data = Product::orderBy('product_name', 'ASC')->paginate(15);
            } elseif($_GET['filter'] === 'title_z_a'){
                $data = Product::orderBy('product_name', 'DESC')->paginate(15);
            } elseif($_GET['filter'] === 'date_new_old'){
                $data = Product::orderBy('created_at', 'DESC')->paginate(15);
            } elseif($_GET['filter'] === 'date_old_new'){
                $data = Product::orderBy('created_at', 'ASC')->paginate(15);
            }
        } elseif (isset($_GET['search'])) {
            $data = Product::where('product_name', 'like', '%'. $_GET['search'] . '%')
                ->orWhere('size', 'like', '%' . $_GET['search'] . '%')
                ->paginate(15);
        } elseif (isset($_GET['category'])) {
            $data = Product::where('category_id', '=', $_GET['category'])->paginate(15);
        }else {
            $data = Product::paginate(15);
        }

        $categories = Category::all();
        if(!Auth::user()){
            return view('catalog', ['data' => $data, 'categories' => $categories]);
        }
        $products = $this->order_products();
        $total = $this->order_total();


        return view('catalog', ['data' => $data, 'total' => $total , 'products' => $products, 'categories' => $categories]);
    }

    public function details($id){
        $product = DB::table('products')->select('*')->where('id', '=', $id)->first();
        $category = DB::table('categories')->select('category_name')->where('id','=', $product->category_id)->first();

        if(!Auth::user()){
            return view('product-details', ['product' => $product, 'category' => $category]);
        }
        $products = $this->order_products();
        $total = $this->order_total();

        return view('product-details', ['product' => $product, 'category' => $category, 'total' => $total, 'products' => $products]);
    }
}
