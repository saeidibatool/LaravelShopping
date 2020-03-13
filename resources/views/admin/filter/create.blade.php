@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">افزودن فیلتر جدید</h3>
  </div>
  <!-- /.box-header -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">

      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" action="{{route('filter.store')}}">
        {{csrf_field()}}
        <div class="box-body">
          <div class="form-group" >
            <label for="exampleInputPassword1">دسته‌بندی</label>
             <select class="form-control" name="category_id">
               <!-- <option value="0"></option> -->
               <?php foreach ($categories as $category): ?>
                 <option value="{{$category->id}}">{{$category->title_fa}}</option>
               <?php endforeach; ?>
             </select>
          </div>

          <div class="form-group" >
            <label for="exampleInputPassword1">فیلتر والد</label>
             <select class="form-control" name="parent_id">
               <option value="0">سرگروه</option>
               <?php foreach ($filters as $filter): ?>
                 <?php
                 $category = \App\Category::where('id',$filter['category_id'])->first();
                  ?>
                 <option value="{{$filter->id}}">{{$category->title_fa}}: {{$filter->name}}</option>
               <?php endforeach; ?>
             </select>
          </div>

          <div class="form-group" >
            <span class="btn btn-dark" onclick="addFilter()">افزودن فیلتر</span>
            <div id="filters_holder">


            </div>
          </div>

        </div>

        <div class="box-footer">
          <button class="btn btn-primary">ارسال</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
  <script>
    function addFilter(){
      var count=document.getElementsByClassName('filter_div').length+1;;
      // alert(count);
      var txt='<div style=" height: 30px; margin: 10px 0;" class="filter_div">' +
          '<input name="name['+count+']" type="text" style="margin-left: 10px;" placeholder="نام فیلتر">' +
          '<input name="en_name['+count+']" type="text" style="margin-left: 10px;" placeholder="نام انگلیسی فیلتر">' +
          '<select name="type['+count+']" id="" style="margin-left: 10px;">' +
          '<option value="1"> دکمه رادیویی</option>' +
          '<option value="2">انتخابگر رنگ</option>' +
          '</select>' +
          '</div>';
      $("#filters_holder").append(txt);
    }
  </script>
@endsection
