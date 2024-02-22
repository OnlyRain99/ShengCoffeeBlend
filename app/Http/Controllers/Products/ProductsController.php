<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Auth;

class ProductsController extends Controller
{
    public function singleProduct($id){

        $product = Product::find($id);


        $relatedProducts = Product::where('type', $product->type)
        ->where('id','!=',$id)->take('4')
        ->orderBy('id','desc')
        ->get();

        return view('products.productsingle',compact('product','relatedProducts'));
    }

    public function addCart(Request $request, $id){

        $addCart = Cart::create([
            "pro_id" => $request->pro_id,
            "name" => $request->name,
            "image" => $request->image,
            "price" => $request->price,
            "user_id" => Auth::user()->id,

        ]);
                echo "item added to cart";
        //return view('products.productsingle',compact('product','relatedProducts'));
    }
}
