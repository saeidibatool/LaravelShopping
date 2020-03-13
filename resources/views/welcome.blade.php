@extends('layouts.default')
@section('main')
<div id="content" class="col-sm-9">
  <!-- Slideshow Start-->
  <div class="slideshow single-slider owl-carousel">
    <?php foreach ($sliders as $slider): ?>
      <div class="item">
        <a href="{{$slider->url}}">
          <img class="img-responsive" src="{{$slider->image}}" alt="{{$slider->title}}" />
        </a>
      </div>
    <?php endforeach; ?>
  </div>
    <!-- Slideshow End-->

    <!-- Featured products Start-->
  <h3 class="subtitle">ویژه</h3>
  <div class="owl-carousel product_carousel">
    <?php foreach ($specials as $special): ?>
      <div class="product-thumb clearfix">
        <div class="image"><a href="product.html"><img src="{{$special->image}}" alt="{{$special->name}}" title="{{$special->name}}" class="img-responsive" /></a></div>
        <div class="caption">
          <h4><a href="product.html">{{$special->name}}</a></h4>
          <p class="price"><span class="price-new">{{(1-($special->discount)/100)*$special->price}} تومان</span> <span class="price-old">{{$special->price}}</span> <span class="saving">{{$special->discount}}%</span></p>

        </div>
        <div class="button-group">
          <button class="btn-primary add-to-cart" type="button" onClick="cart.add('42');" data-id="{{$special->id}}"><span>افزودن به سبد</span></button>
          <div class="add-to-links">
            <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
            <button type="button" data-toggle="tooltip" title="مقایسه this محصولات" onClick=""><i class="fa fa-exchange"></i></button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
    <!-- Featured products End-->

    <div class="marketshop-banner">
      <div class="row">
        <?php foreach ($banners as $banner): ?>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="{{$banner->url}}"><img src="{{$banner->image}}" alt="{{$banner->name}}" title="{{$banner->name}}" /></a></div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="category-module" id="latest_category">
      <h3 class="subtitle">الکترونیکی - <a class="viewall" href="category.tpl">نمایش همه</a></h3>
      <div class="category-module-content">
        <ul id="sub-cat" class="tabs">
          <?php $i=0; ?>
          <?php foreach ($technologies as $technology): ?>
            <?php $i += 1; ?>
            <li><a href="#tab-cat{{$i}}">{{$technology->title_fa}}</a></li>
          <?php endforeach; ?>
        </ul>
        <?php $i = 0; ?>
          <?php foreach ($technologies as $technology): ?>
            <?php $i+=1; ?>
            <?php $pros = App\Product::where('category_id',$technology->id)->get();?>
            <div id="tab-cat{{$i}}" class="tab_content">
              <div class="owl-carousel latest_category_tabs">
                <?php foreach ($pros as $pro): ?>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="{{$pro->image}}" alt="{{$pro->name}}" title="{{$pro->name}}" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">{{$pro->name}}</a></h4>
                      <p class="price"><span class="price-new">{{(1-($pro->discount)/100)*$pro->price}} تومان</span> <span class="price-old">{{$pro->price}}</span> <span class="saving">{{$pro->discount}}%</span></p>
                    </div>
                      <div class="rating">
                        <span class="fa fa-stack">
                          <i class="fa fa-star fa-stack-2x"></i>
                          <i class="fa fa-star-o fa-stack-2x"></i>
                        </span>
                        <span class="fa fa-stack">
                          <i class="fa fa-star fa-stack-2x"></i>
                          <i class="fa fa-star-o fa-stack-2x"></i>
                        </span>
                        <span class="fa fa-stack">
                          <i class="fa fa-star fa-stack-2x"></i>
                          <i class="fa fa-star-o fa-stack-2x"></i>
                        </span>
                        <span class="fa fa-stack">
                          <i class="fa fa-star fa-stack-2x"></i>
                          <i class="fa fa-star-o fa-stack-2x"></i>
                        </span>
                        <span class="fa fa-stack">
                          <i class="fa fa-star-o fa-stack-2x"></i>
                        </span>
                      </div>
                      <div class="button-group">
                        <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                        <div class="add-to-links">
                          <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                          <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                        </div>
                      </div>
                    </div>


                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
      </div>
    </div>
@endsection
