
@extends('layouts.index')
@section('content')

<div class="site-section bg-light text-right" style="background: #fff !important">
<div class="container">
  <div class="row">

  <div class="col-md-8">
    <div class="row">
    @foreach($experience as $exp)
    <div class="col-lg-4 col-md-6 mb-3">
      <div class="post-entry-1 h-100">
        <a href="{{ route('showpost',[$exp->id,$exp->slug]) }}">
          <img style="width:100%" src="{{ asset('public/storage/imgs/'.$exp->img) }}" alt="Image"
           class="img-fluid">
        </a>
        <div class=" post-entry-1-contents">
          <h2><a href="{{ route('showpost',[$exp->id,$exp->slug]) }}">{{$exp->title}}</a></h2>
          <span class="meta d-inline-block mb-3"><i class="fa fa-clock"></i> {{$exp->created_at->diffForHumans() }}
            <span class="mx-2">بواسطة</span>
            @if($exp->anonymous)
            <a href="">
              مجهول
            </a>
            @else
              <a href="{{route('showuser',$exp->user->id)}}">
                {{$exp->user->name}}
              </a>
            @endif
          </span>
          <hr />
          <a href="{{ route('showpost',[$exp->id,$exp->slug]) }}" class="btn btn-primary btn-sm">التجربة
            <i class="fa fa-eye"></i>
           </a>
        </div>

      </div>
    </div>
    @endforeach
  </div>
  </div>

  <div class="col-md-4 col-sm-12">
    @include('layouts.sidebar')
  </div>

  </div>

  <div class="row">
    <hr style="border-color:#fff;width:100%"/>
      {{$experience->links()}}
  </div>

</div>
</div>
@endsection
