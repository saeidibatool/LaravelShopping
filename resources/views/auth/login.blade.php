@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>ورود به سایت</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group has-feedback">
              <input id="email" type="email" name="email" class="form-control @error('email') آدرس ایمیل نامعتبر@enderror" placeholder="ایمیل" value="{{ old('email') }}" required autocomplete="email" autofocus>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <div class="form-group has-feedback">
            <input id="password" type="password" class="form-control @error('password') رمز عبور نامعتبر @enderror" name="password" required autocomplete="current-password" placeholder="رمز عبور">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <div class="checkbox icheck">
                <label>
                    <input type="checkbox" class="square blue icheckbox_square"name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked>
                     مرا به خاطر بسپار
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- یا -</p>
          <a href="{{url('login/google')}}" class="btn text-center btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> ورود با گوگل</a>
        </div>

        <div class="text-right">
          <!-- /.social-auth-links -->
          @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-center">رمز عبورم را فراموش کرده ام.</a><br>
          @endif

          <a href="{{route('register')}}" class="text-center">ثبت نام</a>
        </div>


      </div>
      <!-- /.login-box-body -->
    </div>
<!-- </div> -->



@endsection
