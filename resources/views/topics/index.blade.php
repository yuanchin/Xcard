@extends('layouts.app')

@section('title', '話題列表')

@section('content')

<div class="row mb-5">
  
  <div class="col-lg-3 col-md-3 sidebar">
    @include('topics._sidebar')
  </div>

  <div class="col-lg-9 col-md-9 topic-list">
    <div class="card">

      <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#">最後回覆</a></li>
          <li class="nav-item"><a class="nav-link" href="#">最新發布</a></li>
        </ul>
      </div>

      <div class="card-body">
        {{-- 話題列表 --}}
        @include('topics._topic_list', ['topics' => $topics])
        {{-- 分頁 --}}
        <div class="mt-5">
          {!! $topics->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>

  
</div>

@endsection
