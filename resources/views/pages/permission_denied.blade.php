@extends('layouts.app')
@section('title', '無權限訪問')

@section('content')
  <div class="col-md-4 offset-md-4">
    <div class="card rounded-0">
      <div class="card-body">
        @if (Auth::check())
          <div class="alert alert-danger text-center mb-0">
            當前登入帳號無權限訪問。
          </div>
        @else
          <div class="alert alert-danger text-center">
            請登入以後再進行操作
          </div>

          <a class="btn btn-lg btn-primary btn-block" href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i>
            登 入
          </a>
        @endif
      </div>
    </div>
  </div>
@stop