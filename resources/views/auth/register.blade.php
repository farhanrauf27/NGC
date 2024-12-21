
@extends('layouts.app')
  
@section('content')
<main class="login-form">
  <div class="cotainer mr-3 ml-3" style="margin-top: 8%;">
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="card shadow">
                  <div class="card-header" style="background-color: #d9d9d9">Register</div>
                  <div class="card-body">
  
                      <form action="{{ route('register') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-3"></label>
                              <div class="col-md-6">
                                  <input type="text" id="name" name="name" placeholder="Name" >
                                  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="email_address" class="col-md-3 "></label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" name="email" placeholder="E-Mail Address" >
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
                                  <input type="password" id="password" name="password" placeholder="Password" required>
                                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password-confim" class="col-md-3"></label>
                              <div class="col-md-6">
                                  <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                              </div>
                          </div>
  
  
                          <div class="col-md-6 offset-md-3 mt-5">
                              <button type="submit" class="btn bttn btn-outline-dark shadow ">
                                  Register
                              </button>
                          </div>
                      </form>
                      <div class="col-md-6 offset-md-3 mt-4" style="text-align: center;">
                        <a href="{{ route('login') }}" class="log-reg" >Already have an account? Login</a>
                    </div>  
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection