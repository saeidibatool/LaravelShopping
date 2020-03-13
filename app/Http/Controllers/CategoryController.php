<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
      $sliders = Slider::where('slider_parent_id', 1)->get();
      $categories = Category::where('chId', 0)->get();
      $bests = Product::orderBy('salesـnumber', 'desc')->get();
      $specials = Product::where('special', 1)->get();
      $banners = Slider::where('slider_parent_id', 3)->get();
      $technologies = Category::where('chId', 5)->get();
      $newests = Product::orderBy('created_at', 'desc')->get();

      if($category->chId != 0){
        $products = Product::where('category_id', $category->id)->get();
      }else{
        $cats = Category::where('chId', $category['id'])->get();

        // dd($products);
        $products = [];
        foreach ($cats as $cat) {
          $pros = Product::where('category_id', $cat->id)->get();
          // dd($pros);
          foreach ($pros as $pro) {
            array_push($products, $pro);
          }
        }
      }
      $cat = $category;
      // dd($products);

      return view('category.show', compact('sliders', 'categories', 'bests', 'specials', 'banners', 'technologies', 'newests', 'products', 'cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
