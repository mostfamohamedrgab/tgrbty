@push('css')
  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f0cbdcd61c3b80014ccf36b&product=inline-share-buttons" async="async"></script>
  <style>
      .hero.inner-page {
        height: 50vh !important;
        min-height: 280px;
      }
      .hero .intro {
        margin-top: 100px
      }
      .reacts  {
        margin-top: 20px;
        background: #fff !important;
        padding:  0 !important;
        width: 40%;
        margin: auto;
        background: none;
      }
      .reacts  .btn-md {
        border-radius: 0;
        width:50%;
        cursor: pointer;
      }
      @media(max-width: 775px)
      {
        .reacts  .btn-md {
          font-size: 12px;
          padding: 10px;
          width:100%;
          margin: 5px
        }
      }
      .reacts-row {
        background: #fff
      }
      .login-msg {
        width: 100%;
        margin-top: 10px;
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
      <!--- start reacts scope --->
      <hr />
      <div class="site-section bg-primary reacts">
        <div class="container">
          <div class="reacts-row row align-items-center text-center">
            @if( auth()->check() )
            <!-- like -->
              <button
              id="makeLike"
              href="{{route('react',[$exp->id,'like'])}}" class="btn-md btn-primary text-light">
                <i class="fas fa-thumbs-up"></i>
                <span class="helpful">
                  مفيد
                </span>
                (<span class="count">{{$exp->likesCount}}</span>)
              </button>
              <!-- dislike --->
              <button
              id="makeDislike"
              href="{{route('react',[$exp->id,'dislike'])}}" class="btn-md btn-danger text-light">
                <i class="fas fa-thumbs-down"></i>
                <span class="not-useful">
                غير مفيد
                </span>
                (<span class="count">{{$exp->dislikesCount}}</span>)
              </button>
              @else
              <button class="btn-md btn-primary text-light">
                <i class="fas fa-thumbs-up"></i>
                <span class="helpful">
                  مفيد
                </span>
                (<span class="count">{{$exp->likesCount}}</span>)
              </button>
              <!-- dislike --->
              <button class="btn-md btn-danger text-light">
                <i class="fas fa-thumbs-down"></i>
                <span class="not-useful">
                غير مفيد
                </span>
                (<span class="count">{{$exp->dislikesCount}}</span>)
              </button>

              <div class="login-msg alert alert-info">
                قم بتسجيل
                <a href="{{route('login')}}">
                  الدخول
                </a>
                والمشاركة برأيك
              </div>
              @endif
        </div>
      </div>
      <!--- end reacts scope --->
    </div>
    <hr />
      <h4 class="text-center">شارك علي مواقع التواصل </h4>
    <hr />
      <div class="sharethis-inline-share-buttons"
      data-url="{{route('showpost',[$exp->id,$exp->slug])}}" data-title="{{$exp->title}}"></div>
    <hr />
        <h4 class="text-center">تجارب مشابهة</h4>
    <hr />
      <!-- related exp --->
      @foreach($relatedexp as $exp)
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
      <!--- related exp -->
  </div>

    <div class="col-md-4 sidebar">
      <div class="sidebar-box text-center">

        @if($exp->anonymous != 1)
        <img src="{{ $user->uplodeImg ? asset('public/storage/imgs/'.$user->img) : $user->img }}" alt="Free Website Template by Free-Template.co" class="img-fluid mb-4 w-50 ">
        <h3 class="text-black">{{$user->name}}</h3>
        <p>{{ $user->about }}.</p>
        <p><a href="{{ route('showuser',$user->id) }}" class="btn btn-primary btn-sm text-white">
          عرض جميع التجارب
           <i class="fa fa-eye"></i></a></p>
        @elseif($exp->anonymous == 1)
        <img src="{{ asset('public/imgs/logo.png') }}" alt="Free Website Template by Free-Template.co" class="img-fluid mb-4 w-50 ">
        <h3 class="text-black">نشر ك مجهول</h3>
        <p><a href="{{ route('experiences') }}" class="btn btn-primary btn-sm text-white">
          عرض تجارب اخري
           <i class="fa fa-eye"></i></a></p>
        @endif
      </div>
          @include('layouts.sidebar')
    </div>

</div>
</div>
@endsection
@push('js')
  <script>
  $(document).ready(function (){
    // check if user Login !!
      //**** Make Like *********//
      $('#makeLike').on('click', function (e)
      {
          e.preventDefault(); // prevent reload
          var el = $(this);
          $.ajax({
            type: 'get',
            url: el.attr('href'),
            beforeSend: function (){
              el.attr('disabled',true);
            },
            success: function (res)
            {
                if(res.success)
                {
                  el.children('.count').html(res.likes);
                }
                el.attr('disabled',false);
            }
          });
      });
      //**** Make DileLike *********//
      $("#makeDislike").on('click', function (e)
      {
        e.preventDefault(); // prevent reload
        var el = $(this);
        $.ajax({
          type: 'get',
          url: el.attr('href'),
          beforeSend: function (){
            el.attr('disabled',true);
          },
          success: function (res)
          {
            console.log(res);
              if(res.success)
              {
                el.children('.count').html(res.dislike);
              }
              el.attr('disabled',false);
          }
        });
      });

  });
  </script>
@endpush
