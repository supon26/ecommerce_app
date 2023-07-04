<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Backend\ProductController;

class FrontendController extends Controller
{
    // frontend home page
    public function index(){
        $products = Product::all()->where("status","1");
        return view('frontend.index',compact('products'));
    }

    // frontend shop page
    public function shop(){
    return view('frontend.shop');
    }

    // frontend Single Product page
    public function singleProduct($id){

        $product = Product::find($id);
        return view('frontend.single-product',compact('product'));
    }

    // frontend Cart Product page
    public function cartProduct(){
    return view('frontend.cart');
    }

    // frontend Checkout Product page
    public function checkoutProduct(){
    return view('frontend.checkout');
    }

}
