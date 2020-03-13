<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\Category;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::latest()->paginate(10);
      return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::where('chId','!=',0)->get();
      $brands = Brand::all();
      return view('admin.product.create', compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->all();die;
      $user_id = auth()->user()->id;
      $file = $request['image'];
      $image = $this->ImageUploader($file,'uploads/');
      // return $user_id;die;
      // return $image;

      $this->validate(request(),[
        'name'=>'required|min:5|max:50',
        'brand'=>'required|numeric',
        'discount'=>'required|numeric',
        'price'=>'required|numeric',
        'category'=>'required',
      ]);
      $product = Product::create([
        'name'=>$request['name'],
        'brand_id'=>$request['brand'],
        'body'=>$request['body'],
        'discount'=>$request['discount'],
        'price'=>$request['price'],
        'image'=>$image,
        'user_id'=>$user_id,
        'status'=>$request['status'],
        'count'=>$request['count'],
        'category_id'=>$request['category'],
      ]);
      return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      $categories = Category::where('chId','!=',0)->get();
      $brands = Brand::all();
      return view('admin.product.edit', compact('product','brands', 'categories'));
      // if(Gate::allows('edit_product', $product)){
      //
      // }else{
      //   return "<h1>شما اجازه دسترسی به این قسمت ندارید</h1>";
      // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $product->update($data);
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'));
    }

    public function gallery(Request $request){
      $id = $request->get('id');
      $product = Product::findOrFail($id);
      return view('admin.product.gallery', compact('product'));
    }

    public function upload(Request $request, Product $product){
      $files = $request->file('file');
      $id = $request->get('id');
      // return $id;
      foreach ($files as $file) {
        $image = $this->ImageUploader($file,'uploads/gallery/');
        if($image){
          $productImage = new ProductImage();
          $productImage->product_id = $id;
          $productImage->url=$image;
          $productImage->save();
        }
      }
      return redirect(route('product.index'));
    }
}
