@push('css')
  <style>
    .sidebar-box {
      box-shadow: 1px 1px 1px #eee, -1px -1px 1px #eee;
    }
  </style>
@endpush
@extends('layouts.index')
@section('content')

<div class="site-section">
<div class="container">
  <div class="row">
    <div class="col-md-8 blog-content text-right">
      {!! $exp->content !!}
    </div>
    <div class="col-md-4 sidebar">

      <div class="sidebar-box text-center">
        <img src="{{ asset('public/storage/imgs/'.$exp->user->img) }}" alt="Free Website Template by Free-Template.co" class="img-fluid mb-4 w-50 ">
        <h3 class="text-black">{{$exp->user->name}}</h3>
        <p>{{ $exp->user->about }}.</p>
        <p><a href="#" class="btn btn-primary btn-sm text-white">
          عرض جميع التجارب
           <i class="fa fa-eye"></i></a></p>
      </div>

      <div class="sidebar-box">
        <form action="#" class="search-form">
          <div class="form-group">
            <span class="icon fa fa-search"></span>
            <input type="text" class="form-control" placeholder="اكتب كلمة ودوس enter">
          </div>
        </form>
      </div>

      <div class="sidebar-box">
        <div class="categories text-right">
          <h3>الاقسام</h3>
          @foreach($sections as $section)
            <li><a href="#"><span style="left:0;right:100%;">(12)</span>
              {{$section->name }} </a></li>
          @endforeach
        </div>
      </div>

      <div class="sidebar-box text-center">
        <h3 class="text-black text-center" >هل لديك تجربة مؤثرة ؟</h3>
        <p class="text-center">
            الحياة عبارة عن تجارب منها المفيد والمضر هدفنا
            عرض التجارب المفيدة لكي يخطوا الناس خطوها ويستفيدو منها
            وعرض التجارب الضارة لكي يتجنبها الناس ويحذروها .
        .</p>
        <a href="#" class="btn btn-primary btn-white">شارك الان</a>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
