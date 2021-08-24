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
                                <h1 class="h2 mt-1 mb-5">Xcard <i><sup>Register</sup></i></h1>
                            </div>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                           placeholder="請輸入您要註冊的姓名 …">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           placeholder="請輸入您要註冊的信箱 …">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="new-password"
                                           placeholder="請輸入您要註冊的密碼 …">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="請再一次輸入您要註冊的密碼 …">
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
