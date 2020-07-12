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

        <form class="trip-form">

          <div class="row align-items-center">

            <div class="mb-5 mb-md-0 col-md-5">
              <div class="form-control-wrap">
                <input type="text" id="cf-4" placeholder="التجربة .." name="experience" class="form-control  px-3">
              </div>
            </div>

            <div class="mb-5 mb-md-0 col-md-4">
              <select name="section" required class="custom-select form-control">
                <option value="">اختر القسم</option>
                <option value="">جميع الاقسام</option>
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





<div class="site-section bg-light">
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="section-heading text-center"><strong>اخر التجارب</strong></h2>
      <p class="mb-5 text-center">العديد من التجارب من المهم معرفتها للأستفاده منها !!.</p>
    </div>
  </div>


  <div class="row">
    @foreach($experience as $exp)
    <div class="col-lg-4 col-md-6 mb-4 text-right">
      <div class="post-entry-1 h-100">
        <a href="{{ route('showpost',$exp->slug) }}">
          <img
          style="width:100%"
          src="{{asset('public/storage/imgs/'.$exp->img)}}" alt="Image"
           class="img-fluid">
        </a>
        <div class="post-entry-1-contents">

          <h2><a href="{{ route('showpost',$exp->slug) }}">{{$exp->title}}</a></h2>
          <span class="meta d-inline-block mb-3">{{$exp->created_at->diffForHumans() }} <span class="mx-2">by</span> <a href="#">
            {{$exp->anonymous ? 'مجهول' : $exp->user->name}}
          </a></span> <br />
          <a href="{{ route('showpost',$exp->slug) }}" class="btn btn-primary btn-sm">التجربة
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
      <h2 class="section-heading text-center"><strong>أراء المستخدمين</strong></h2>
      <p class="mb-5 text-center">الاستفادة من الاخطاء وتعلم العديد من التجارب النافعه هدفنا !.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 mb-4 mb-lg-0">
      <div class="testimonial-2">
        <blockquote class="mb-4">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
        </blockquote>
        <div class="d-flex v-card align-items-center">
          <img src="{{ asset('public/images/person_1.jpg') }}" alt="Image" class="img-fluid mr-3">
          <div class="author-name">
            <span class="d-block">Mike Fisher</span>
            <span>Owner, Ford</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4 mb-lg-0">
      <div class="testimonial-2">
        <blockquote class="mb-4">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
        </blockquote>
        <div class="d-flex v-card align-items-center">
          <img src="{{ asset('public/images/person_2.jpg') }}" alt="Image" class="img-fluid mr-3">
          <div class="author-name">
            <span class="d-block">Jean Stanley</span>
            <span>Traveler</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4 mb-lg-0">
      <div class="testimonial-2">
        <blockquote class="mb-4">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
        </blockquote>
        <div class="d-flex v-card align-items-center">
          <img src="{{ asset('public/images/person_3.jpg') }}" alt="Image" class="img-fluid mr-3">
          <div class="author-name">
            <span class="d-block">Katie Rose</span>
            <span >Customer</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
