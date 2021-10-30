<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use App\Models\Products;

class ProductsController extends Controller
{
    public function showProducts()
    {
        return view('products');
    }

    public function addProduct(Request $request)
    {
        $validated = $request->validate(
        [
            'title' => 'required|max:10',
            'Description' => 'required|max:500',
            'category' => 'required',
            'price' => 'required|numeric|max:9999999.99|min:0.01',
            'photo' => 'required|mimes:jpg,png|max:20000',
        ],
        [
            'title.required' => 'Please Input Title',
            'title.max' => 'Please Less than 100chars',
            'price.min' => 'Minimum price is 0.01',
            'price.max' => 'Minimum price is 9999999.99',
            'photo.uploaded' => 'Please Upload jpg or png format',
            'photo.max' => 'Please enter a file less than 20mb',

        ]);

            $image = $request->file('photo');

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('image/products/'.$name_gen);

            $save_url = 'image/products/'.$name_gen;

            Products::insert([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'Description'=>$request->Description,
            'category'=>$request->category,
            'price'=>$request->price,
            'photo'=> $save_url,
            'created_at'=>carbon::now()
        ]);
        return Redirect()->back()->with('success', 'Product Inserted Successfully');
    }

    public function allProducts()
    {
        $products = Products::query()->get();
        return view('ecommerce', compact('products'));
    }

    public function listProducts()
    {
        $products = Products::latest()->get();
        return view('Manage-products', compact('products'));
    }

    public function updateProduct(Request $request)
    {
        $validated = $request->validate(
        [
            'title' => 'required|max:10',
            'Description' => 'required|max:500',
            'category' => 'required',
            'price' => 'required|numeric|max:9999999.99|min:0.01',
            'photo' => 'mimes:jpg,png|max:20000',
        ],
        [
            'title.required' => 'Please Input Title',
            'title.max' => 'Please Less than 100chars',
            'price.min' => 'Minimum price is 0.01',
            'price.max' => 'Minimum price is 9999999.99',
            'photo.uploaded' => 'Please Upload jpg or png format',
            'photo.max' => 'Please enter a file less than 20mb',

        ]);
            $product_id = $request->id;
            $old_img = $request->old_image;

        if($request->file('photo'))
        {
            unlink($old_img);
            $image = $request->file('photo');

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('image/products/'.$name_gen);

            $save_url = 'image/products/'.$name_gen;

            Products::findOrFail($product_id)->update(
                [
                    'user_id'=>Auth::user()->id,
                    'title'=>$request->title,
                    'description'=>$request->Description,
                    'category'=>$request->category,
                    'price'=>$request->price,
                    'photo'=> $save_url,
                    'updated_at'=>carbon::now()
                ]);
                return Redirect()->back()->with('success', 'Product Updated Successfully');
        }else{
            Products::findOrFail($product_id)->update(
                [
                    'user_id'=>Auth::user()->id,
                    'title'=>$request->title,
                    'description'=>$request->Description,
                    'category'=>$request->category,
                    'price'=>$request->price,
                    'updated_at'=>carbon::now()
                ]);
                return Redirect()->back()->with('success' , 'Product Updated Successfully');
            }
        }

    public function deleteProduct($id)
    {
        $image = Products::find($id);
        $old_image = $image->photo;
        unlink($old_image);

        Products::find($id)->delete();
        return Redirect()->back()->with('success' , 'Product Deleted Successfully');
    }
   
}
