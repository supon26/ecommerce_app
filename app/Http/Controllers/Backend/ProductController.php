<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->product_name  = $request->p_name;
        $product->current_price = $request->c_price;
        $product->prev_price    = $request->p_price;

        // Image Uploading start ->
        if($image = $request->file('p_image')){
            $customImageName = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move("uploads/products/",$customImageName);
        }
        $product->product_image = $customImageName;
        // Image Uploading end ->
        $product->save();
        return redirect()->route('product.manage');
 
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = Product::all();
        return view('backend.products.manage',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('backend.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // echo "<pre>";
        // print_r($request->all());
        $product = Product::find($id);
        // print_r($product); dd($product)
        $product->product_name = $request->p_name;
        $product->current_price = $request->c_price;
        $product->prev_price = $request->p_price;

        // Image Part start --
        $deleteOldImage = "uploads/products/".$product->product_image;
        if($newImage = $request->file('p_image')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $newImageName = uniqid().'.'.$newImage->getClientOriginalExtension();
            $newImage->move("uploads/products/",$newImageName);

        }else{
            $newImageName = $product->product_image;
        }

        $product->product_image = $newImageName;
        //End Image Part --
        $product->update();
        return redirect()->route('product.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $deleteOldImage = 'uploads/products/'.$product->product_image;
        if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
        }
        $product->delete();
        return back();
    }

    // Active to Inactive :
    public function atoi(string $id){
        $product = Product::find($id);
        $product->status = 0;
        $product->update();
        return back();
    }

    // Active to Inactive :
    public function itoa($id){
        $product = Product::find($id);
        $product->status = 1;
        $product->update();
        return back();
    }
}
