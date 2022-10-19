<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImages;
use App\Cart;

class HomeController extends Controller
{
    public function index() {
        $products = Product::all();
        
        foreach ($products as $key => $values) {
            $images = ProductImages::select('imageName')->where('product_id', $values->id)->first();
            $products[$key]->product_images = $images->imageName;
        }

        return view('home.home', compact('products'));
    }

    public function viewProduct($id) {
        $products = Product::where('id', $id)->first();
        
        $images = ProductImages::select('imageName')->where('product_id', $products->id)->get();
        $products->product_images = $images;
        
        return view('home.singleproduct', compact('products'));
    }

    public function getCart($id) {
        $carts = Cart::where('userid', $id)->count();
        return response()->json(['status' => 'success', 'cartCount' => $carts], 200);
    }

    public function addToCart(Request $request) {
        $userid = $request->userid;
        $product_id = $request->product_id;

        $cart = new Cart;
        $cart->userid = $userid;
        $cart->product_id = $product_id;

        $cart->save();

        return response()->json(['status' => 'success', 'message' => 'Product added to cart'], 200);
    }

    public function cart($userid) {
        $cart = Cart::select('products.*')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.userid', $userid)
            ->get();
        foreach ($cart as $key => $values) {
            $images = ProductImages::select('imageName')->where('product_id', $values->id)->first();
            $cart[$key]->product_images = $images->imageName;
        }
        return view('home.cart', compact('cart'));
    }
}
