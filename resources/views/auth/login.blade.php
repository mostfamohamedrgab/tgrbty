@push('css')
  <style>
      .card {
        border-radius: 0;
        border-color: #eee;
      }
      .card-header {
        border-radius: 0;
        border: none;
      }
      .login-parent {
        margin-top:150px;
        margin-bottom: 50px
      }
      * {
        text-align: right
      }
      .bg-blue {
        background: #007bff;
        color:#fff
      }
      .input-reset , .input-reset:hover ,.input-reset:focus
      {
        border: none;
        border-bottom: 1px solid #eee;
        border-radius: 0;
        position: relative;
      }
      .input-parent:after {
        content: "";
        transition: all .5s ease;
        right: 0;
        position: absolute;
        bottom: 0;
        width: 0;
        height: 1px;
        background: #007bff
      }
      .input-parent:hover:after {
        width:100%
      }
  </style>
@endpush

@extends('layouts.index')
@section('content')
<div class="container login-parent">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-blue">تسجيل دخول</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">البريد الالكتروني</label>

                            <div class="col-md-6 input-parent">
                                <input id="email" type="email" class="input-reset form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">كلمة السر</label>

                            <div class="col-md-6 input-parent">
                                <input id="password" type="password" class="input-reset form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label style="margin-right:20px;" class="form-check-label" for="remember">
                                        تذكرني
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-sm">
                                  دخول
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                      نسيت كلمة السر ؟
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <hr />
                    <div class="form-group">
                      <p class="text-center">او الدخول عن طريق</p>
                      <div class="col-md-12 col-md-offset-4">

                          <a class="btn-sm btn-primary" style="margin:5px;background:#4267B2" href="{{ url('/login/facebook') }}">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                             فيس بوك
                           </a>

                          <a class="btn-sm btn-primary" style="margin:5px;background:#DB4437"
                          href="{{ url('login/google') }}">
                            <i class="fab fa-google" aria-hidden="true"></i>
                             جوجل
                          </a>

                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
