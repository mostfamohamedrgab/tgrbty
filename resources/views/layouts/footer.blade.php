<div class=" site-section bg-primary py-5">
<div class="container">
  <div class="row align-items-center text-center">
    <div class="col-lg-7 mb-4 mb-md-0 text-center">
      <h2 class="mb-0 text-white text-center">لديك تجربة مميزة ؟</h2>
      <p class="mb-0 opa-7 text-center">
        شارك معنا بتجاربك المميزة
      .</p>
    </div>
    <div class="col-lg-5 text-md-right">
      <a href="{{ route('profile') }}" class="btn btn-primary btn-white">شارك الان
        <i class="fa fa-share"></i>
      </a>
    </div>
  </div>
</div>
</div>
<footer class="site-footer text-right">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h2 class="footer-heading mb-4">من نحن</h2>
        <p>
            فريق من المطورين والمصممين والمسوقين العرب , هدفنا اثراء
            المحتوي العربي ومساعده العالم العربي علي التعلم والاستفاده
            من الخبرات المختلفة .
        . </p>
      </div>
      <div class="col-lg-8 ml-auto">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="footer-heading mb-4">روابط سريعة</h2>
            <ul class="list-unstyled">
              @guest
              <li><a class="text-dark" href="{{ route('login') }}">
                <i class="fa fa-user" aria-hidden="true"></i>
                دخول</a></li>
              <li><a class="text-dark" href="{{route('register')}}">
                <i class="fa fa-plus" aria-hidden="true"></i>
                حساب جديد</a></li>
              @endguest
              <li><a class="text-dark" href="{{route('experiences')}}">
                <i class="fas fa-male"></i>
                التجارب</a></li>
              <li><a class="text-dark" href="{{route('contact')}}">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                اتصل بنا</a></li>
            </ul>
          </div>
          <div class="col-lg-4">
            <h2 class="footer-heading mb-4">روابط اخري</h2>
            <ul class="list-unstyled">
            </ul>
          </div>
          <div class="col-lg-4 ">
            <h2 class="footer-heading mb-4">Support</h2>
            <ul class=" list-unstyled">
              <li><a class="text-dark" href="#">
                <i class="fa fa-phone"></i>
                + 0201 1458 3424</a></li>
              <li><a class="text-dark" href="#">
                <i class="fa fa-envelope-open-text"></i>
                t2grbty@gmail.com</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
    <div class="row pt-5 mt-5 text-center" style="margin-top: 0 !important;">
      <div class="col-md-12">
        <div class="border-top pt-5">
          <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        <p> صنع ب  <i class="icon-heart text-danger" aria-hidden="true"></i></p>
         &copy; ۲۰۲۰ جميع الحقوق محفوظة
         ل تجربتي |
          تطوير
         <a href="https://colorlib.com" target="_blank" >مصطفي</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
        </div>
      </div>

    </div>
  </div>
</footer>

</div>

<script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('public/js/popper.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/js/jquery.sticky.js')}}"></script>
<script src="{{asset('public/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('public/js/all.min.js') }}"></script>
<script src="{{ asset('public/js/aos.js') }}"></script>
<script src="{{ asset('public/js/main.js') }}"></script>
@stack('js')

</body>

</html>
