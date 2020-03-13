@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">افزودن دسته‌بندی</h3>
  </div>
  <!-- /.box-header -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">

      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" enctype="multipart/form-data" action="{{route('category.store')}}">
        {{csrf_field()}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">نام انگلیسی</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" value="{{old('title')}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">نام فارسی</label>
               <input name="title_fa" type="text" class="form-control" id="exampleInputEmail1" value="{{old('title_fa')}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">سرگروه</label>
             <select class="form-control" name="chId">
               <option value="0"></option>
               <?php foreach ($categories as $category): ?>
                 <option value="{{$category->id}}">{{$category->title_fa}}</option>
               <?php endforeach; ?>
             </select>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">تصویر دسته‌بندی</label>
            <input class="form-control" name="image" type="file" id="exampleInputFile">
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
