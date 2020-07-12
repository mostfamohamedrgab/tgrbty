@extends('layouts.index')
@section('content')

<div class="site-section bg-light text-right">
<div class="container">
  <div class="row">

    @foreach($experience as $exp)
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="post-entry-1 h-100">
        <a href="{{ route('showpost',$exp->slug) }}">
          <img style="width:100%" src="{{ asset('public/storage/imgs/'.$exp->img) }}" alt="Image"
           class="img-fluid">
        </a>
        <div class=" post-entry-1-contents">
          <h2><a href="{{ route('showpost',$exp->slug) }}">{{$exp->title}}</a></h2>
          <span class="meta d-inline-block mb-3"><i class="fa fa-clock-o"></i> {{$exp->created_at->diffForHumans() }}
            <span class="mx-2">بواسطة</span> <span style="color:#000">{{$exp->user->name}}</span></span>
          <hr />
          <a href="{{ route('showpost',$exp->slug) }}" class="btn btn-primary btn-sm">التجربة
            <i class="fa fa-eye"></i>
           </a>
        </div>

      </div>
    </div>
    @endforeach

  </div>

  <div class="row">
    <hr style="border-color:#fff;width:100%"/>
      {{$experience->links()}}
  </div>

</div>
</div>
@endsection
