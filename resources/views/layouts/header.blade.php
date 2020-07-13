<!doctype html>
<html lang="ar" dir="rtl">

  <head>
    <title>{{isset($pageTitle) ? $pageTitle : 'تجربتي' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="موقع تجربتي لعرض التجارب المختلفة والمفيدة في الحياة">
    <meta name="keywords" content="{{ isset($keywords) ? $keywords : 'تجربتي , تجاربي , تجربة , تجارب , جرب , حاول , محاوله , يحاول' }}">
    <meta name="author" content="تجربتي">
    <link rel="icon" href="{{asset('public/imgs/logo.png')}}" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/aos.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <!-- reset some styles -->
    <link rel="stylesheet" href="{{ asset('public/css/reset.css') }}" />
    <style>
      * {
        font-family: 'Cairo', sans-serif;
      }
      .logo-img
      {
        width: 80px;
        height: 80px;
      }
      .post-entry-1  img {
        max-height: 200px;
        min-height: 200px;
      }
      .site-footer {
        padding-bottom: 0
      }
      .site-footer .border-top {
        padding-top: 0
      }
    </style>
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
                <a href="{{ route('home') }}"><strong>
                  <img src="{{ asset('public/imgs/logo.png') }}" class="logo-img" />
                </strong>
                </a>
              </div>
            </div>

            <div class="col-9  text-right">

              <span class="d-inline-block d-lg-none toggle-list"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 ">

            <span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">

                  <li><a href="{{ route('experiences') }}" class="nav-link">التجارب
                    <i class="fas fa-male"></i>
                  </a></li>

                  <li><a href="{{ route('contact') }}" class="nav-link">
                    اتصل بنا
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  </a></li>

                  @if(! auth()->user())
                  <li><a href="{{ route('login') }}" class="nav-link">دخول
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </a></li>
                  <li><a href="{{ route('register') }}" class="nav-link">حساب جديد
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a></li>
                  @else
                  <li><a href="{{ route('profile') }}" class="nav-link">شارك تجاربك
                    <i class="fa fa-share"></i>
                  </a></li>
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('profile') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item"
                          style="color:#000 !important;text-align:center;"
                          href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              تسجيل خروج
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
                  @endif

                </ul>
              </nav>
            </div>


          </div>
        </div>

      </header>
      <!--- intro for all ather pages -->
      @if(isset($pageTitle) AND  $pageTitle != 'الرئيسية')
        @if(isset($subpath))
        <div class="hero inner-page" style="background-image: url('../public/imgs/home-background.jpeg');">
        @else
        <div class="hero inner-page" style="background-image: url('public/imgs/home-background.jpeg');">
        @endif

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
