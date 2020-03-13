<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // dd($request->all());
      $categories = Category::search($request->all());
      // $categories = Category::latest()->paginate(10);
      return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::where('chId', 0)->get();
      return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->all();
      $file = $request['image'];
      $image = $this->ImageUploader($file,'uploads/');
      // dd($image);

      $this->validate(request(),[
        'title'=>'required',
        'title_fa'=>'required',
        // 'chId'=>'required',
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      if($request['chId']){
        $category = Category::create([
          'chId'=>$request['chId'],
          'title'=>$request['title'],
          'title_fa'=>$request['title_fa'],
          'image'=>$image,
        ]);
      }
      else{
        $category = Category::create([

          'title'=>$request['title'],
          'title_fa'=>$request['title_fa'],
          'image'=>$image,
        ]);
      }

      return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
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
      $data = $request->all();
      $category->update($data);
      return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      $category->delete();

      return redirect(route('category.index'));
    }
}
