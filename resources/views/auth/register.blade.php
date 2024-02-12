@extends('layout.layout')

@section('title', 'Register')

@section('content')
  <div class="row justify-content-center">
    <div class="col-12 col-sm-8 col-md-6">
      <form class="form mt-5" action="{{ route('register.store') }}" method="post">
        @csrf
        <h3 class="text-center text-dark">@lang('register.register')</h3>
        <div class="form-group">
          <label for="name" class="text-dark">@lang('register.name'):</label><br>
          <input type="name" name="name" id="name" class="form-control">
          @error('name')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="email" class="text-dark">Email:</label><br>
          <input type="email" name="email" id="email" class="form-control">
          @error('email')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="password" class="text-dark">@lang('register.password'):</label><br>
          <input type="password" name="password" id="password" class="form-control">
          @error('password')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="password_confirmation" class="text-dark">@lang('register.confirm_password'):</label><br>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
          @error('password_confirmation')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="remember-me" class="text-dark"></label><br>
          <input type="submit" name="submit" class="btn btn-dark btn-md" value="@lang('register.register')">
        </div>
        <div class="text-right mt-2">
          <a href="{{route('login')}}" class="text-dark">@lang('register.login_here')</a>
        </div>
      </form>
    </div>
  </div>
@endsection
