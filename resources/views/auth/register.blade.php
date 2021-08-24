@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            
            <!-- Login Form-->
            <div class="card border-0 shadow-lg my-5">
                <div class="row no-gutters">


                    <div class="col-md-7">
                        <img src="https://i0.hippopx.com/photos/823/780/947/dog-the-most-obvious-labrador-black-preview.jpg" class=" w-100 h-100" alt="dog">
                    </div>


                    <div class="col-md-5">
                        <div class="card-body m-2">
                            <div class="text-center">
                                <h1 class="h2 mt-1 mb-3">Xcard <i><sup>Register</sup></i></h1>
                            </div>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus placeholder="請輸入您要註冊的姓名 …">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required placeholder="請輸入您要註冊的信箱 …">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required placeholder="請輸入您要註冊的密碼 …">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required
                                           placeholder="請再一次輸入您要註冊的密碼 …">
                                </div>

                                <div class="form-group">
                                    <input id="captcha" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}"
                                           name="captcha" required
                                           placeholder="請輸入驗證碼 …">
                                    <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src('flat') }}"
                                         onclick="this.src='/captcha/flat?' + Math.random()" title="點擊圖片重新獲取驗證碼">
                                    @if ($errors->has('captcha'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary btn-block rounded-pill">
                                    {{ __('註冊') }}
                                </button>

                            </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">已經有帳號了嗎？ 點我登入！</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- End -- Login Form-->

        </div>
    </div>
</div>
@endsection
