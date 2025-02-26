@extends('modules.auth.layout')

@section('title', 'Login')

@section('content')
    <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        <div class="d-flex flex-column-fluid p-6 p-lg-20 justify-content-center">
            <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-500px p-5">
                <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10">
                    <form class="form w-100" method="POST" novalidate="novalidate" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-11">
                            <h1 class="text-gray-900 fw-bolder mb-3 fs-1">Welcome Back,</h1>
                            <p>Please enter your email and password to continue.</p>
                        </div>
                        <div class="fv-row mb-8">
                            <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="fv-row mb-3">
                            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent @error('password') is-invalid @enderror" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            <a href="authentication/layouts/creative/reset-password.html" class="link-primary">Forgot Password ?</a>
                        </div>
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <span class="indicator-label">Sign In</span>
                                <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
