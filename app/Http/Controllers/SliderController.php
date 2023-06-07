<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index(){
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $sliders = DB::table('sliders')
            ->select('sliders.id as slider_id','sliders.description as slider_description', 'status','products.*')
            ->leftJoin('products', 'products.id', '=', 'product_id')
            ->paginate(15);
        return view('admin-sliders', ['data' => $sliders]);
    }

    public function create(){
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $products = Product::where('discount_price', '!=', '0')->get();

        return view('admin-slider-create', ['products' => $products]);
    }

    public function create_submit(Request $request){
        $validated = $request->validate([
            'product_id' => 'required',
            'description' => 'required'
        ]);

        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $slider = new Slider;

        $slider->product_id = $request->product_id;
        $slider->description = $request->description;
        $slider->status = 'active';
        if ($request->file('photo') == NULL){
            $slider->image = '';
        }
        else {
            $filename = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(Storage::path('/public/image/sliders/'), $filename);
            Image::make(Storage::path('/public/image/sliders/').$filename)->save();

            $slider->image = $filename;
        }

        $slider->save();

        return redirect()->route('admin-sliders');
    }

    public function status($id)
    {
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $slider = slider::where('id', $id)->first();
        if ($slider->status == 'active') {
            $slider->status = 'disable';
        } else {
            $slider->status = 'active';
        }
        $slider->save();
        return redirect()->route('admin-sliders');
    }

    public function destroy($id){
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $slider = slider::where('id', '=', $id)->first();

        $slider->delete();

        return redirect()->route('admin-sliders');
    }
}
