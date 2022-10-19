<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImages;
use App\Cart;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $products = Product::all();
        
        foreach ($products as $key => $values) {
            $images = ProductImages::select('imageName')->where('product_id', $values->id)->get();
            $products[$key]->product_images = $images;
        }
        return view('admin.product.productlist', compact('products'));
    }

    public function addProducts() {
        return view('admin.product.addproduct');
    }

    public function saveProducts(Request $request) {
        $productName = $request->productname;
        $productPrice = $request->price;
        $productImages = $request->file('products');

        $product = new Product;
        $product->productName = $productName;
        $product->productPrice = $productPrice;
        if ($product->save()) {
            $product_id = $product->id;
            $saveimg = $this->saveImages($productImages, $product_id);
            if ($saveimg) {
                return redirect('admin');
            }
        }
    }

    private function saveImages($images, $product_id) {
        foreach ($images as $image) {
            $imageName = $image->getClientOriginalName();
            Storage::disk('public')->put('product_images/'.$imageName, file_get_contents($image));

            $productimages = new ProductImages;
            $productimages->product_id  = $product_id;
            $productimages->imageName = $imageName;
            $productimages->save();
        }
        return true;
    }

    public function getCartData() {
        $cart = Cart::select('products.*')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->get();
        foreach ($cart as $key => $values) {
            $images = ProductImages::select('imageName')->where('product_id', $values->id)->get();
            $cart[$key]->product_images = $images;
        }
        return view('admin.cartlist', compact('cart'));
    }
}
