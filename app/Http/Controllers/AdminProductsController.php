<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminProductsController extends Controller
{

    public function index()
    {
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $data = Product::paginate(10);
        return view('admin-products',
            ['data' => $data],
            ['categories' => Category::all()]);
    }

    public function create()
    {
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        return view('admin-product-create',
            ['categories' => Category::all()]);
    }

    public function create_submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'size' =>  'required',
            'price' => 'required',
            'discount' => '',
            'category' => 'required',
            'description' => 'required'
        ]);

        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $product = new product();
        $product->product_name = $request->input('name');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->discount_price = $request->input('discount');
        $product->category_id = $request->input('category');
        $product->count = 0;
        $product->total_sales = 0;
        $product->admin_updated_id = Auth::user()->id;
        $product->admin_created_id = Auth::user()->id;
        $product->description = $request->input('description');
        if ($request->file('photo') == NULL){
            $product->image = '';
        }
        else {
            $filename = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(Storage::path('/public/image/products/'), $filename);
            Image::make(Storage::path('/public/image/products/').$filename)->save();

            $product->image = $filename;
        }
        $product->save();

        return redirect()->route('admin-products');
    }

    public function details(Product $product, $id)
    {
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $product = new Product();
        return view('admin-product-details', ['product' => $product->find($id)],
            ['categories' => Category::all() , 'admins' => User::all()]);
    }

    public function edit(Product $product, $id)
    {
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $product = new Product();
        return view('admin-product-edit',
            ['product' => $product->find($id),'categories' => Category::all()]);
    }

    public function edit_submit(Request $request, $id)
    {
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'size' =>  'required',
            'price' => 'required',
            'discount' => '',
            'category' => 'required',
            'description' => 'required'
        ]);

        $product = Product::find($id);
        $product->product_name = $request->input('name');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->discount_price = $request->input('discount');
        $product->category_id = $request->input('category');
        $product->admin_updated_id = Auth::user()->id;
        $product->admin_created_id = Auth::user()->id;
        $product->description = $request->input('description');
        if ($request->file('photo') == NULL){
            $product->image = '';
        }
        else {
            $filename = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(Storage::path('/public/image/products/'), $filename);
            Image::make(Storage::path('/public/image/products/').$filename)->save();

            $product->image = $filename;
        }
        $product->save();

        return redirect()->route('admin-products');
    }

    public function change_count($id)
    {
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $product = Product::where('id', $id)->first();

        return view('admin-product-count', ['product' => $product]);
    }
    public function change_count_submit(Request $request, $id){
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $product = Product::where('id', '=', $id)->first();
        $product->count = $request->count;
        $product->save();

        return redirect()->route('admin-products');
    }
    public function destroy($id)
    {
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        Product::find($id)->delete();
        return redirect()->route('admin-products');
    }
}
