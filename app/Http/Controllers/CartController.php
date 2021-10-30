<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use \Response;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addProductToCart($id)
    {
      $order = Products::where('id',$id)->first();
            Cart::add([
                'id' => $order->id,
                'name' => $order->title,
                'qty' => 1,
                'price' => $order->price,
                'weight' => 1,
                'options'=> ['image' => $order->photo],
                            ['user' => $order->category]
                  ]);

          $notification = array(
            'message' => 'Product Added to cart Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->to('/')->with($notification);
            
    }

    public function checkCart()
    {

        $content = Cart::content();
        return response()->json($content);

    }

    public function showCart()
    {
        $cart = Cart::content();
        return view('Cart', compact('cart'));
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Product Removed From Cart Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
            

    }

    public function updateCart(Request $request)
    {
        $rowId = $request->productid;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        $notification = array(
            'message' => 'Product Quantity Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
            
    }
}