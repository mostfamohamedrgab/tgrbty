@push('css')
  <style>
      .hero.inner-page {
        height: 50vh !important;
        min-height: 280px;
      }
      .hero .intro {
        margin-top: 100px
      }
  </style>
@endpush
@extends('layouts.index')
@section('content')

<div class="site-section">
<div class="container">
  <div class="row">

  <div class="col-md-8 blog-content text-right">
    @foreach($user->Experiences as $exp)
    <div class="col-lg-6 col-md-6 mb-6">
      <div class="post-entry-1 h-100">
        <a href="{{ route('showpost',[$exp->id,$exp->slug]) }}">
          <img style="width:100%" src="{{ asset('public/storage/imgs/'.$exp->img) }}" alt="Image"
           class="img-fluid">
        </a>
        <div class=" post-entry-1-contents">
          <h2><a href="{{ route('showpost',[$exp->id,$exp->slug]) }}">{{$exp->title}}</a></h2>
          <span class="meta d-inline-block mb-3"><i class="fa fa-clock"></i> {{$exp->created_at->diffForHumans() }}
            <span class="mx-2">بواسطة</span> <span style="color:#000">{{$exp->user->name}}</span></span>
          <hr />
          <a href="{{ route('showpost',[$exp->id,$exp->slug]) }}" class="btn btn-primary btn-sm">التجربة
            <i class="fa fa-eye"></i>
           </a>
        </div>

      </div>
    </div>
    @endforeach
  </div>


    <div class="col-md-4 sidebar">
      <div class="sidebar-box text-center">

        <img src="{{ $user->uplodeImg ? asset('public/storage/imgs/'.$user->img) : $user->img }}" alt="{{$user->name}}" class="img-fluid mb-4 w-50 ">
          <h3 class="text-black">{{$user->name}}</h3>
          <p>{{ $user->about }}.</p>
        </div>
        @include('layouts.sidebar')
    </div>

  </div>
</div>
</div>
@endsection
