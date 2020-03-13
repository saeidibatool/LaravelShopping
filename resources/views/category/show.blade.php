@extends('layouts.default')
@section('main')
<div id="content" class="col-sm-9">
  <h1 class="title">{{$cat->title_fa}}</h1>


  <div class="row products-category">

      <?php foreach ($products as $product): ?>
        <div class="product-layout product-grid col-lg-5ths col-md-5ths col-sm-3 col-xs-12">
          <div class="product-thumb">
            <div class="image"><a href="product.html"><img src="/{{$product->image}}" alt="{{$product->name}}" title="{{$product->name}}" class="img-responsive" /></a></div>
            <div>
              <div class="caption">
                <h4><a href="product.html">{{$product->name}}</a></h4>
                <p class="description">{{$product->body}}</p>
                <p class="price"><span class="price-new">{{(1-($product->discount)/100)*$product->price}} تومان</span> <span class="price-old">{{$product->price}}</span> <span class="saving">{{$product->discount}}%</span></p>
              </div>
              <div class="button-group">
                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                <div class="add-to-links">
                  <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                  <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>




  </div>
  <div class="row">
    <div class="col-sm-6 text-left">
      <ul class="pagination">

      </ul>
    </div>

  </div>
</div>
@endsection
