<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
    public function store(Request $request) {
         $this->validate($request, [
            'name' => 'required | regex:/^[\pL\s\-]+$/u',
            'desc' => 'required | regex:/^[\pL\s\-]+$/u',
            'image' => 'required',
        ]);
        return 'success';

        $product = new Product();
        $getImg = $request->file('image');
        $imgExt = $getImg->getClientOriginalExtension();
        $imgName = time().'.'.$imgExt;
        $imgFolder = 'product-image/';
        $getImg->move($imgFolder,$imgName);

        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->image = $imgFolder.$imgName;
        $product->status = $request->status;
        $product->save();

        return back()->with('msg','Product Added Successfuly!');
    }
    public function edit($id) {
        $product = Product::find($id);
        return view('edit', compact('product'));
    }
    public function update(Request $request, $id) {
        $product = new Product();
        $getImg = $request->file('image');
        $imgExt = $getImg->getClientOriginalExtension();
        $imgName = time().'.'.$imgExt;
        $imgFolder = 'product-image/';
        $getImg->move($imgFolder,$imgName);

        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->image = $imgFolder.$imgName;
        $product->status = $request->status;
        $product->save();

        return redirect('/')->with('msg','Product updated Successfuly!');
    }
    public function unpublishedProduct($id) {
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        return back()->with('msg','Product Deactivated Successfully.');
    }
    public function publishedProduct($id) {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        return back()->with('msg','Product Activated Successfully.');
    }
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return back()->with('msg','Product Deleted Successfully.');
    }
    
}