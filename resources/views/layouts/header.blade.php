<!doctype html>
<html lang="ar" dir="rtl">

  <head>
    <title>{{isset($pageTitle) ? $pageTitle : 'تجربتي' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" >

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/aos.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <!-- reset some styles -->
    <link rel="stylesheet" href="{{ asset('public/css/reset.css') }}" />
    @stack('css')
  </head>

<body lang="ar" dir="rtl">



    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="{{ route('home') }}"><strong>تجربتي</strong></a>
              </div>
            </div>

            <div class="col-9  text-right">

              <span class="d-inline-block d-lg-none toggle-list"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"><h1><i class="fa fa-list"></i></h1></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">

                  <li><a href="{{ route('blog') }}" class="nav-link">التجارب
                    <i class="fa fa-industry" aria-hidden="true"></i>
                  </a></li>

                  <li><a href="contact.html" class="nav-link">اتصل بنا
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  </a></li>

                  @if(! auth()->user())
                  <li><a href="{{ route('login') }}" class="nav-link">دخول
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </a></li>
                  <li><a href="{{ route('register') }}" class="nav-link">حساب جديد
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a></li>
                  @endif

                </ul>
              </nav>
            </div>


          </div>
        </div>

      </header>
      <!--- intro for all ather pages -->
      @if(isset($pageTitle) AND  $pageTitle != 'الرئيسية')
      <div class="hero inner-page" style="background-image: url('public/imgs/home-background.jpeg');">

        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro text-right">
                <h1><strong>{{$pageTitle}}</strong></h1>
                <div class="custom-breadcrumbs"><a href="{{route('home')}}">الرئيسية</a> <span class="mx-2">/</span> <strong>
                  {{$pageTitle}}
                </strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>
      @endif
