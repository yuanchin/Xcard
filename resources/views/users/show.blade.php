@extends('layouts.app')

@section('title', $user->name . ' 的個人中心')

@section('content')

<div class="row">

  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
    <div class="card shadow">
      <img class="card-img-top rounded-circle" src="{{ $user->avatar }}" alt="{{ $user->name }}">
      <div class="card-body mt-2">
            <h5><strong>個人簡介</strong></h5>
            <p>{{ $user->introduction }}</p>
            <hr>
            <h5><strong>註冊於</strong></h5>
            <p>{{ $user->created_at->diffForHumans() }}</p>
      </div>
    </div>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="card ">
      <div class="card-body">
          <h1 class="mb-0" style="font-size:22px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
      </div>
    </div>
    <hr>

    {{-- 用戶發布的內容 --}}
    <div class="card ">
      <div class="card-body">
        暂无数据 ~_~
      </div>
    </div>

  </div>
</div>
@stop