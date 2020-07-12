@push('css')
  <style>
  .page-parent {
    margin-top:150px;
    margin-bottom: 50px
  }
      .card {
        border-radius: 0;
        border-color: #eee;
      }
      .card-header {
        border-radius: 0;
        border: none;
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
<div class="container page-parent">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-blue">حساب جديد</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">الأسم</label>

                            <div class="col-md-6 input-parent">
                                <input id="name" type="text" class="input-reset form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">البريد الالكتروني</label>

                            <div class="col-md-6 input-parent">
                                <input id="email" type="email" class="input-reset form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="input-reset form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تأكيد كلمة السر</label>

                            <div class="col-md-6 input-parent">
                                <input id="password-confirm" type="password" class="input-reset form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
