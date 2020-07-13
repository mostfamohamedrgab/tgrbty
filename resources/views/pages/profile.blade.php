@push('css')
<link href="{{asset('public/css/jquery.toast.css')}}" rel="stylesheet" />
  <style>
      .hero.inner-page {
        height: 50vh !important;
        min-height: 280px;
      }
      .hero .intro {
        margin-top: 100px
      }
  </style>
  <script src="https://cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
@endpush

@extends('layouts.index')
@section('content')

<div class="site-section">
<div class="container">
  <div class="row">

  <div class="col-md-8 blog-content text-right">
    <h3 class="text-center">شارك تجاربك مع العالم !</h3>
    <hr />
    <form id="add-exp" action="{{ route('addExp') }}" method="post">
      @csrf
      <textarea name="content">{{old('content')}}</textarea>
      <script>
            CKEDITOR.replace( 'content',{
              contentsLangDirection: 'rtl',
            });
      </script>
      <div class="form-group" style="margin-top:10px;">
        <label>اختر قسم</label>
        <select name="section_id" class="form-control">
            @foreach($sections as $section)
              <option value="{{$section->id}}">{{$section->name}}</option>
            @endforeach
        </select>
      </div>
      <button form="add-exp" class="btn btn-primary btn-white">
        شارك  <i class="fa fa-share"></i>
      </button>
    </form>
    <hr />
    @foreach($user->Experiences as $exp)
    <div class="col-lg-6 col-md-6 mb-6">
      <div class="post-entry-1 h-100">
        <a href="{{ route('showpost',[$exp->id,$exp->slug]) }}">
          <img style="width:100%" src="{{ asset('public/storage/imgs/'.$exp->img) }}" alt="Image"
           class="img-fluid">
        </a>
        <div class=" post-entry-1-contents">
          <h2><a href="{{ route('showpost',[$exp->id,$exp->slug]) }}">{{$exp->title}}</a></h2>
          <span class="meta d-inline-block mb-3"><i class="fa fa-clock"></i> {{$exp->created_at->diffForHumans() }} </span>

            <div class="react">
              <button class="btn-xs btn-primary text-light">
                <i class="fas fa-thumbs-up"></i>
                  مفيد
                {{ $exp->likes->count() }}
              </button>
              <!-- dislike --->
              <button class="btn-xs btn-danger text-light">
                <i class="fas fa-thumbs-down"></i>
              غير مفيد
                {{ $exp->dislikes->count() }}
              </button>
            </div>
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
        <form id="edit-profile" enctype="multipart/form-data" action="{{ route('editProfile') }}" method="post">
        @csrf
        <img id="imagepreview" src="{{ $user->uplodeImg ? asset('public/storage/imgs/'.$user->img) : $user->img}}" alt="Free Website Template by Free-Template.co" class="img-fluid mb-4 w-50 ">
          <!--- img -->
          <div class="custom-file">
           <input  type="file" name="img" class="custom-file-input" id="imgfield">
           <label class="custom-file-label" for="validatedCustomFile">تغير الصورة * اختياري</label>
           <div class="invalid-feedback">خطا !!</div>
         </div>
          <!-- img -->
          <div class="form-group" style="margin-top:10px;">
            <input required type="text" class="form-control form-control-sm"  value="{{$user->name}}" name="name" />
          </div>
          <div class="form-group" style="margin-top:10px;">
            <input required type="email" class="form-control form-control-sm"  value="{{$user->email}}" name="email" />
          </div>
          <div class="form-group">
            <textarea class="form-control form-control-sm" name="about" placeholder="نبذة عنك * اختياري ">{{ $user->about }}</textarea>
          </div>
          <div class="form-group" style="margin-top:10px;">
            <input type="password" class="form-control form-control-sm" name="password" placeholder="كلمة السر الجديدة * اختياري" />
          </div>
          <button form="edit-profile" class="text-light btn btn-success">
            تعديل  <i class="fa fa-edit"></i>
          </button>
        </form>
        </div>
        @include('layouts.sidebar')
    </div>

  </div>
</div>
</div>
@endsection
@push('js')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="{{asset('public/js/jquery.toast.js')}}"></script>

@if($errors->any())
  @foreach($errors->all() as $e)
  <script>
  $.toast({
      text : "{{$e}}",
      allowToastClose:true,
      hideAfter: 10000,
      position:'top-right',
      bgColor:'#ff0000'
  })
  </script>
  @endforeach
@endif

@if( session()->has('success') )
  <script>
  $.toast({
      text : "{{ session()->get('success') }}",
      allowToastClose:true,
      hideAfter: 10000,
      position:'top-right',
      bgColor:'#D4EDDA'
  })
  </script>
@endif

@if( session()->has('msg') )
  <script>
  $.toast({
      text : "{{ session()->get('msg') }}",
      allowToastClose:true,
      hideAfter: 10000,
      position:'top-right',
      bgColor:'#D1ECF1'
  })
  </script>
@endif

<script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#imagepreview').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }

      $("#imgfield").change(function() {
        readURL(this);
      });
  </script>
@endpush
