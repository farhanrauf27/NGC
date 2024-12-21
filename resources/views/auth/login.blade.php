@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-info">
            {{ $message }}
        </div>
    @endif
    <main class="login-form" style="margin-top:8%;">
        <div class="cotainer mr-3 ml-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header">Login</div>
                        <div class="card-body">

                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-3"></label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" name="email"
                                            placeholder="E-Mail Address" autocomplete="off">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-3"></label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" name="password" placeholder="Password"
                                            required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-3 mt-5">
                                    <button type="submit" class="btn bttn btn-outline-dark shadow">
                                        Login
                                    </button>
                                </div>
                            </form>
                            <div class="col-md-6 offset-md-3 mt-4" style="text-align: center;">
                                <a href="{{ route('register') }}" class="log-reg">Need an account? Register</a>
                                <br>
                                @if (Route::has('password.request'))
                                    <a class="log-reg" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
