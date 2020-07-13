@push('css')
<!-- toast -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="{{asset('public/js/jquery.toast.js')}}"></script>
<link href="{{asset('public/css/jquery.toast.css')}}" rel="stylesheet" />
@endpush
@extends('layouts.index')
@section('content')

@include('layouts.msgs')

<div class="site-section bg-light" id="contact-section">
  <div class="container">
    <div class="row justify-content-center text-center">
    <div class="col-7 text-center mb-5">
      <h2>اتصل بنا !</h2>
      <p>
        تبني المجتمعات البنائة باختلاف الاراء ووجهات النظر ..
        ساعدنا في تطوير المجتمع وجعله مكان افضل للجميع
      </p>
    </div>
  </div>
    <div class="row">
      <div class="col-lg-8 mb-5" >
        <form action="{{ route('contact') }}" method="post">
          @csrf
          <div class="form-group row">
            <div class="col-md-12 mb-4 mb-lg-0">
              <input required="required" type="text" class="form-control" placeholder="الاسم" name="name" value="{{old('name')}}">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <input required="required" type="text" class="form-control" placeholder="البريد الالكتروني " name="email" value="{{old('email')}}">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <textarea required="required" name="msg" id="" class="form-control" placeholder="رسالتك ." cols="30" rows="10">{{old('msg')}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12 text-right">
              <input type="submit" class="btn  btn-primary text-white" value="أرسال رسالة">
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-4 ml-auto text-right">
        <div class="bg-white p-3 p-md-5">
          <h3 class="text-black mb-4">معلومات الاتصال</h3>
          <ul class="list-unstyled footer-link">
            <li class="d-block mb-3"><span  class="d-block text-center text-black">الهاتف:</span><span dir="ltr">+20 1014 5834 23</span></li>
            <li class="d-block mb-3"><span dir="ltr" class="text-center d-block text-black">البريد الالكتروني:</span><span>t2grbty@gmail.com</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
