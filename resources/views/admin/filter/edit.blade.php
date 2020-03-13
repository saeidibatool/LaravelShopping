@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">ویرایش {{$filter->name}}</h3>
  </div>
  <!-- /.box-header -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">مثال ساده</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" action="{{route('filter.update', ['filter'=>$filter->id])}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">نام انگلیسی</label>
            <input name="en_name" type="text" class="form-control" id="exampleInputEmail1" value="{{$filter->en_name}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">نام فارسی</label>
            <input name="name" type="text" class="form-control" id="exampleInputPassword1" value="{{$filter->name}}">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">دسته‌بندی</label>
             <select class="form-control" name="category_id">
               <?php foreach ($categories as $category): ?>
                 <?php if ($filter->category->title == $category->title): ?>
                   <option value="{{$category->id}}" selected>{{$category->title_fa}}</option>
                 <?php else: ?>
                   <option value="{{$category->id}}">{{$category->title_fa}}</option>
                 <?php endif; ?>
               <?php endforeach; ?>
             </select>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">فیلتر والد</label>
             <select class="form-control" name="parent_id">
               <option value="0" selected>سرگروه</option>

               <?php foreach ($filters as $val): ?>
                 <?php
                 $category = \App\Category::where('id',$val['category_id'])->first();
                  ?>
                 <?php if ($filter->parent_id == $val->id): ?>
                   <option value="{{$val->id}}" selected>{{$category->title_fa}}: {{$val->name}}</option>
                 <?php else: ?>
                   <option value="{{$val->id}}">{{$category->title_fa}}: {{$val->name}}</option>
                 <?php endif; ?>
               <?php endforeach; ?>
             </select>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">نوع فیلتر</label>
            <div style=" height: 30px; margin: 10px 0;" class="filter_div">
                <select name="type" id="">
                  <?php if ($filter->type == 1): ?>
                    <option value=1 selected>دکمه رادیویی</option>
                    <option value=2>انتخابگر رنگ</option>
                  <?php else: ?>
                    <option value=1>دکمه رادیویی</option>
                    <option value=2  selected>انتخابگر رنگ</option>
                  <?php endif; ?>

                </select>
            </div>
          </div>


        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">ارسال</button>
        </div>
      </form>
    </div>
    <!-- /.box -->

    <!-- Form Element sizes -->

    <!-- /.box -->


    <!-- /.box -->

    <!-- Input addon -->

    <!-- /.box -->

  </div>
  <!-- /.box-body -->
</div>
@endsection
