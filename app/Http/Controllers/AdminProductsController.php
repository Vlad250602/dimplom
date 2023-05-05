<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{

    public function index()
    {
        $data = DB::table('products')->get();
        return view('admin-products',
            ['data' => $data],
            ['categories' => Category::all() , 'subcategories' => Subcategory::all()]);
    }

    public function create()
    {

        return view('admin-product-create',
            ['categories' => Category::all()],
            ['subcategories' => Subcategory::all()]);
    }

    public function create_submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'size' =>  'required',
            'price' => 'required',
            'discount' => '',
            'category' => 'required',
            'subcategory' => 'required',
            'description' => 'required'
        ]);

        $product = new product();
        $product->product_name = $request->input('name');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->category_id = $request->input('category');
        $product->subcategory_id = $request->input('subcategory');
        $product->count = 0;
        $product->total_sales = 0;
        $product->admin_updated_id = Auth::user()->id;
        $product->admin_created_id = Auth::user()->id;
        $product->image = '';
        $product->description = $request->input('description');
        /*if ($request->file('photo') === NULL){
            $admin->photo = 'emp_placeholder.png';
        }
        else {
            $filename = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(Storage::path('/public/image/employees/') . 'origin/', $filename);
            Image::make(Storage::path('/public/image/employees/').'origin/'.$filename)->fit(300, 300)->save();

            $admin->photo = $filename;
        }*/


        $product->save();

        return redirect()->route('admin-products');
    }

    public function details(Product $product, $id)
    {
        $product = new Product();
        return view('admin-product-details', ['product' => $product->find($id)],
            ['categories' => Category::all() , 'subcategories' => Subcategory::all(), 'admins' => User::all()]);
    }

    public function edit(Product $product, $id)
    {
        $product = new Product();
        return view('admin-product-edit',
            ['product' => $product->find($id),'categories' => Category::all(), 'subcategories' => Subcategory::all()]);
    }

    public function edit_submit(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'size' =>  'required',
            'price' => 'required',
            'discount' => '',
            'category' => 'required',
            'subcategory' => 'required',
            'description' => 'required'
        ]);

        $product = Product::find($id);
        $product->product_name = $request->input('name');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->category_id = $request->input('category');
        $product->subcategory_id = $request->input('subcategory');
        $product->count = 0;
        $product->total_sales = 0;
        $product->admin_updated_id = Auth::user()->id;
        $product->admin_created_id = Auth::user()->id;
        $product->image = '';
        $product->description = $request->input('description');

        $product->save();

        return redirect()->route('admin-products');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin-products');
    }
}
