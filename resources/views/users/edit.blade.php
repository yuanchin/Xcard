@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-8">

      <div class="card shadow">
        <div class="card-header text-white bg-dark">
          <h3 class="mb-0">{{__('編輯個人資料')}}</h3>
        </div>

        <div class="card-body">

          <form action="{{ route('users.update', $user->id) }}" method="POST"
                accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('shared._error')

            <div class="form-group">
              <label for="name-field" class="h4 mb-3">用戶名</label>
              <input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $user->name) }}" />
            </div>
            <hr>
            <div class="form-group">
              <label for="email-field" class="h4  my-3">信 箱</label>
              <input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $user->email) }}" />
            </div>
            <hr>
            <div class="form-group">
              <label for="introduction-field" class="h4  my-3">個人簡介</label>
              <textarea name="introduction" id="introduction-field" class="form-control" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
            </div>
            <hr>

            <div class="form-group mb-4">
              <label for="" class="avatar-label h4  my-3">用戶頭貼</label>
              <input type="file" name="avatar" class="form-control-file">

              @if ($user->avatar)
                <br>
                <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
              @endif
            </div>

            <div class="well well-sm">
              <button type="submit" class="btn btn-primary btn-block">保存</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
  </div>

</div>

@endsection