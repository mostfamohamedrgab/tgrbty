@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 >
          الاعضاء
          </h1>

          <hr style="border-color:#aaa"/>
          <button type="button" class="p-right btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            اضافة عضو <i class="fa fa-users"></i>
          </button>
          </section>
          @include('layouts.msgs')
        <!-- Main content -->
        <section class="content">

    <table class="table">
      <thead>
        <tr >
          <td>#</td>
          <td>الاسم</td>
          <td>الايميل</td>
          <td>صورة</td>
          <td>نبذه</td>
          <td>اجراء<td>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
            <img src="{{asset('public/storage/imgs/'.$user->img)}}"
              style="width:40px;height:40px;border-radius:50%" />
          </td>
          <td>{{$user->about}}</td>

          <td>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$user->id}}">
              تعديل <i class="fa fa-edit"></i>
            </button>


          <form class="delete"
          style="display:inline-block"
          action="{{ route('admin.User.destroy',$user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="حذف" />
          </form>

          </td>
        </tr>


        <!--edit  Modal -->
      <div class="modal fade" id="edit-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">تعديل {{$user->name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form method="post" enctype="multipart/form-data" action="{{route('admin.User.update',$user->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>الاسم</label>
                  <input type="text" class="form-control" required name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                  <label>الايميل</label>
                  <input type="email" class="form-control"  value="{{ $user->email }}" required name="email">
                </div>

                <div class="form-group">
                  <label>صورة
                    <img src="{{asset('public/storage/imgs/'.$user->img)}}"
                      style="width:40px;height:40px;border-radius:50%" />
                  </label>
                  <input type="file" class="form-control"  name="img">
                </div>

                <div class="form-group">
                  <label>كلمه السر</label>
                  <input type="password" class="form-control"  name="password">
                </div>
                <div class="form-group">
                  <label>نبذه</label>
                  <textarea class="form-control" name="about">{{$user->about }}</textarea>
                </div>
                <hr />
                <button type="submit" class="btn btn-primary">تعديل</button>
          </form>

            </div>
          </div>
        </div>
      </div>
        <!-- end edit model --->

        @endforeach
      </tbody>
    </table>
    <!-- start add model --->
    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">اضافه عضو جديد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" enctype="multipart/form-data" action="{{route('admin.User.store')}}">
            @csrf
            <div class="form-group">
              <label>الاسم</label>
              <input type="text" class="form-control" required name="name" value="{{old('name')}}">
            </div>

            <div class="form-group">
              <label>الايميل</label>
              <input type="email" class="form-control"  value="{{old('email')}}" required name="email">
            </div>

            <div class="form-group">
              <label>صورة</label>
              <input type="file" class="form-control"  name="img">
            </div>

            <div class="form-group">
              <label>نبذه</label>
              <textarea class="form-control" name="about">{{old('about')}}</textarea>
            </div>

            <div class="form-group">
              <label>كلمه السر</label>
              <input type="password" class="form-control" required name="password">
            </div>


            <button type="submit" class="btn btn-primary">حفظ</button>
      </form>

        </div>
      </div>
    </div>
  </div>
    <!-- end add model --->
@stop
@push('css')
  <style type="text/css">
      form {
        text-align: right !important
      }
  </style>
@endpush
@push('js')
  <script>

    $(document).on('click','.delete', function (e){

      if( confirm('تاكيد ؟') )
      {
        return true;
      }else{
        return false;
      }

    });

    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })

  </script>
@endpush
