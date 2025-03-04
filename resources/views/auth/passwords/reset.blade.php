@extends('modules.auth.layout')

@section('title', 'New Password')

@section('content')
<div class="d-flex flex-column flex-column-fluid flex-lg-row">
    <div class="d-flex flex-column-fluid p-6 p-lg-20 justify-content-center">
        <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-500px p-5">
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10">
                    <form method="POST" class="form w-100" novalidate="novalidate" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-11">
                            <h1 class="text-gray-900 fw-bolder mb-3 fs-1">New Password,</h1>
                            <p>Please add your new password.</p>
                        </div>
                              <div class="fv-row mb-8">
                                <input id="email" type="email" class="form-control bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                                <div class="fv-row mb-8">
                                <input id="password" placeholder="New password" type="password" class="form-control bg-transparent @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="fv-row mb-8">
                                <input id="password-confirm" placeholder="Repeat password" type="password" class="form-control bg-transparent" name="password_confirmation" required autocomplete="new-password">
                            </div>


                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <span class="indicator-label">Continue</span>
                                <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
