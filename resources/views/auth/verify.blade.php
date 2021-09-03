@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-dark bg-white"><h3>{{ __('驗證 E-mail') }}</h3></div>

                <div class="card-body m-2">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('請先驗證您的 E-mail，如果您未收到請點擊以下：') }}
                    <div class="mt-4">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block ">{{ __('click here to request another') }}</button>
                        </form>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
