@extends('layouts.app')

@section('title', isset($category) ? $category->name : '話題列表')

@section('content')

<div class="row mb-5">
  
  <div class="col-lg-2 col-md-2 sidebar">
    @include('topics._sidebar')
  </div>

  <div class="col-lg-7 col-md-7 topic-list">
    <div class="card">

      <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link {{ active_class( ! if_query('order', 'recent')) }}"
               href="{{ Request::url() }}?order=default">
              最後回覆
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_class(if_query('order', 'recent')) }}"
               href="{{ Request::url() }}?order=recent">
              最新發布
            </a>
          </li>
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

  <div class="col-lg-3 col-md-3">
    @if (isset($category))
      <div class="alert alert-info" role="alert">
        {{ $category->name }} ：{{ $category->description }}
      </div>
    @endif
  </div>

  
</div>

@endsection
