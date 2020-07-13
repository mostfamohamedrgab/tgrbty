@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            أضافة تجربة جديدة
          </h1>
          <hr style="border-color:#aaa"/>
          @include('layouts.msgs')
        <!-- Main content -->
<section class="content">

    <form
    enctype="multipart/form-data"
    action="{{route('admin.Experience.store')}}" method="post">
      @csrf
    <div class="form-group">
      <label >عنوان التجربة</label>
      <input type="text" class="form-control" name="title" required value="{{old('title')}}">
    </div>

    <div class="form-group">
      <label >صوره مصغره
        <img id="blah" src="{{asset('public/imgs/avatar.png')}}"
            style="width:70px;height:70px;border-radius:50%;margin:10px" />
      </label>
      <input id="imgInp" type="file" accept="image/*" class="form-control" name="img" required>
    </div>

    <div class="form-group">
      <label>المحتوي</label>
      <textarea name="content">{{old('content')}}</textarea>
        <script>
          CKEDITOR.replace('content', {
              language: 'ar'
            });
        </script>
    </div>

    <div class="form-group">
      <label >المستخدم</label>
      <select class="form-control" required="required" name="user_id">
        @foreach($users as $user)
          <option
          {{$user->id == old('user_id') ? 'selected' : ''}}
          value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label >القسم</label>
      <select class="form-control" required="required" name="section_id">
        @foreach($sections as $section)
          <option
          {{$user->id == old('section_id') ? 'selected' : ''}}
          value="{{$section->id}}">{{$section->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label >حالة التجربة</label>
      <select class="form-control" required="required" name="approved">
        <option value="0">غير مفعل</option>
        <option value="1">مفعل</option>
      </select>
    </div>

    <div class="form-group">
      <label >نشر ك مجهول</label>
      <input type="checkbox" value="1" name="anonymous" />
    </div>

    <div class="form-group">
      <label >الكلمات المفتاحية</label>
      <textarea class="form-control" name="keywords">{{old('keywords')}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">حفظ</button>
  </form>



@stop
@push('css')
  <style>
      form {
        padding: 20px;
        box-shadow: 1px 1px 2px #eee,-1px -1px 2px #eee;
        background: #fff;
        text-align:right;
      }
      form input {
        text-align:right;
      }
  </style>

  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/translations/ar.js"></script>

@endpush

@push('js')
  <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }

      $("#imgInp").change(function() {
        readURL(this);
      });
  </script>
@endpush
