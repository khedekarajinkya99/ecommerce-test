<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImages;
use App\Cart;

class ApiController extends Controller
{
    public function getProducts() {
        $products = Product::all();
        if (count($products) > 0) {
            foreach ($products as $key => $values) {
                $images = ProductImages::select('imageName')->where('product_id', $values->id)->first();
                $products[$key]->product_images = $images->imageName;
            }
            return response()->json(['status' => 'fail', 'productData' => $products], 200);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Record not found'], 404);
        }
    }

    public function addToCart(Request $request) {
        $request->validate([
            'userid' => 'required',
            'product_id' => 'required'
        ]);
        $userid = $request->userid;
        $product_id = $request->product_id;

        $cart = new Cart;
        $cart->userid = $userid;
        $cart->product_id = $product_id;

        if ($cart->save()) {
            return response()->json(['status' => 'success', 'message' => 'Product added to cart'], 200);
        } else {
            return response()->json(['status' => 'success', 'message' => 'Some error occured.']. 500);
        }
    }

    public function getCartData($userid) {
        $cart = Cart::select('products.*')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.userid', $userid)
            ->get();
        if (count($cart) > 0) {
            foreach ($cart as $key => $values) {
                $images = ProductImages::select('imageName')->where('product_id', $values->id)->first();
                $cart[$key]->product_images = $images->imageName;
            }
            return response()->json(['status' => 'success', 'cartData' => $cart], 200);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Record not found'], 404);
        }
    }
}
