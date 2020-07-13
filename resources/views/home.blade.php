@push('css')
  <style>
      .best-likes {
        box-shadow: 1px 1px 2px #eee, -1px -1px 2px #eee;
        transition: all .5s ease
        }
      .best-likes:hover {
        box-shadow: 4px 4px 8px #eee, -4px -4px 8px #eee;
      }
  </style>
@endpush
@extends('layouts.index')

@section('content')
<div class="hero" style="background-image: url('public/imgs/home-background.jpeg');">

  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-10">

        <div class="row mb-5">
          <div class="col-lg-7 intro">
            <h1 class="text-center" style="color: #fff"><strong>دور علي تجربة</strong> </h1>
          </div>
        </div>

        <form class="trip-form" method="get" action="{{route('experiences')}}">

          <div class="row align-items-center">

            <div class="mb-5 mb-md-0 col-md-5">
              <div class="form-control-wrap">
                <input type="text" id="cf-4" name="title" placeholder="التجربة .." name="experience" class="form-control  px-3">
              </div>
            </div>

            <div class="mb-5 mb-md-0 col-md-4">
              <select name="section_id"  class="custom-select form-control">
                <option value="">اختر القسم</option>
                @foreach($sections as $section)
                <option value="{{$section->id}}">{{$section->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-2 mb-md-0 col-md-3">
              <input type="submit" value="أبحث الان" class="btn btn-primary btn-block py-3">
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>



<div class="site-section text-right">
  <div class="container">
    <h2 class="section-heading text-center"><strong>
      شارك تجاربك !
    </strong></h2>
    <p class="mb-5 text-center">
      شارك العالم تجاربك
    </p>

    <div class="row mb-5">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="step">
          <span>1</span>
          <div class="step-inner">
            <span class="number text-primary">01.</span>
            <h3>قم بتسجيل حساب</h3>
            <p>
              قم بتسجيل حساب بسرعة وسهوله
              قم بملئ البينات او بالتسجيل عبر مواقع التواصل
              <a href="{{ route('register') }}">أنشاء حساب</a>
              !</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="step">
          <span>2</span>
          <div class="step-inner">
            <span class="number text-primary">02.</span>
            <h3>تسجيل الدخول</h3>
            <p>
              قم بتسجيل الدخول بكل سهولة ويسر عن طريق الايميل وكلمه السر
              <a href="{{route('login')}}">تسجيل دخول</a>
              !</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="step">
          <span>3</span>
          <div class="step-inner">
            <span class="number text-primary">03.</span>
            <h3>شارك تجاربك مع العالم !</h3>
            <p>
              قم بكتابة التجربة الخاصه بك ونتائج التجربة وستقوم ادارة الموقع
              بدلا عنك بالتدقيق الاملائي ثم نشرها
              <a href="#">
                مشاركة تجربه
              </a>
              !</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="site-section" style="background:#F4F7FC !important">
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="section-heading text-center"><strong>اخر التجارب</strong></h2>
      <p class="mb-5 text-center">العديد من التجارب من المهم معرفتها للأستفاده منها !!.</p>
    </div>
  </div>


  <div class="row">
    @foreach($experience as $exp)
    <div class="col-lg-3 col-md-6 mb-4 text-right">
      <div class="post-entry-1 h-100">
        <a href="{{ route('showpost',[$exp->id,$exp->slug]) }}">
          <img
          style="width:100%"
          src="{{asset('public/storage/imgs/'.$exp->img)}}" alt="Image"
           class="img-fluid">
        </a>
        <div class="post-entry-1-contents">

          <h2><a href="{{ route('showpost',[$exp->id,$exp->slug]) }}">{{$exp->title}}</a></h2>
          <span class="meta d-inline-block mb-3"><i class="fa fa-clock"></i> {{$exp->created_at->diffForHumans() }} <span class="mx-2">بواسطة</span>
          @if($exp->anonymous)
          <a href="">
            مجهول
          </a>
          @else
            <a href="{{route('showuser',$exp->user->id)}}">
              {{$exp->user->name}}
            </a>
          @endif
        </span> <br />
          <a href="{{ route('showpost',[$exp->id,$exp->slug]) }}" class="btn btn-primary btn-sm">التجربة
            <i class="fa fa-eye"></i>
           </a>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>
</div>

<div class="site-section ">
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="section-heading text-center"><strong>الاكثر أفادة</strong></h2>
      <p class="mb-5 text-center">
        بناءا علي تجارب المستخدمين ونسبة الأفادة اليك الافضل من وجهه
        نظر المستخدمين .
      </p>
    </div>
  </div>
  <div class="row text-right">
    @foreach($bestExp as $exp)
    <div class="col-lg-3 col-md-6 mb-4 text-right">
      <div class="post-entry-1 h-100 best-likes">
        <a href="{{ route('showpost',[$exp->id,$exp->slug]) }}">
          <img
          style="width:100%"
          src="{{asset('public/storage/imgs/'.$exp->img)}}" alt="Image"
           class="img-fluid">
        </a>
        <div class="post-entry-1-contents">

          <h2><a href="{{ route('showpost',[$exp->id,$exp->slug]) }}">{{$exp->title}}</a>
          </h2>
          <span class="meta d-inline-block mb-3"><i class="fa fa-clock"></i> {{$exp->created_at->diffForHumans() }} <span class="mx-2">بواسطة</span>
          @if($exp->anonymous)
          <a href="">
            مجهول
          </a>
          @else
            <a href="{{route('showuser',$exp->user->id)}}">
              {{$exp->user->name}}
            </a>
          @endif
        </span> <br />
          <a href="{{ route('showpost',[$exp->id,$exp->slug]) }}" class="btn btn-primary btn-sm">التجربة
            <i class="fa fa-eye"></i>
           </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
@endsection
