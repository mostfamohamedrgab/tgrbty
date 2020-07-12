@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            التجارب
          </h1>

          <hr style="border-color:#aaa"/>
          <a  class="p-right btn btn-primary" href="{{ route('admin.Experience.create') }}" >
            اضافة تجربة
            <i class="fa fa-plus"></i>
          </a>
          </section>
          @include('layouts.msgs')
        <!-- Main content -->
        <section class="content">

          <table class="table">
            <thead>
              <tr >
                <td>#</td>
                <td>عنوان التجربة</td>
                <td>صوره مصغرة</td>
                <td>الناشر</td>
                <td>بينات العضو</td>
                <td>الوقت</td>
                <td>اجراء</td>
              </tr>
            </thead>
            <tbody>
              @foreach($experiences as $experience)
              <tr>
                <td>{{$experience->id}}</td>
                <td>{{$experience->title}}</td>
                <td>
                  <a target="_blank" href="{{ asset('public/storage/imgs/'.$experience->img) }}">
                    <img src="{{ asset('public/storage/imgs/'.$experience->img) }}"
                      style="width:50px;border-radius: 50%;height:50px;"
                      />
                  </a>
                </td>
                <td>{{$experience->user->name }}</td>
                <td>{{$experience->anonymous ? 'anonymous' : 'عام' }}</td>

                <td>{{$experience->created_at->diffForHumans() }}</td>
                <td>

                <a class="btn btn-info" href="{{ route('admin.Experience.show',$experience->id) }}">
                  مشاهدة <i class="fa fa-eye"></i></a>

                @if($experience->approved)
                <a class="changestuts btn btn-danger" href="{{ route('admin.Experience.chnagestutes',$experience->id) }}">
                  ايقاف <i class="fa fa-close"></i></a>
                @else
                <a class="changestuts btn btn-success" href="{{ route('admin.Experience.chnagestutes',$experience->id) }}">
                  تفعيل <i class="fa fa-check"></i></a>
                @endif

                <a class="btn btn-info" href="{{ route('admin.Experience.edit',$experience->id) }}">
                  تعديل <i class="fa fa-edit"></i></a>
                <form class="delete"
                style="display:inline-block"
                action="{{ route('admin.Experience.destroy',$experience->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" class="btn btn-danger" value="حذف" />
                </form>

                </td>
              </tr>
              @endforeach
            </tbody>
            </table>


@endsection
@push('js')
  <script>


  $(document).on('click','.changestuts', function (e){
      e.preventDefault();

      var el = $(this); // the elment that cliked

      $.ajax({
        url: $(this).attr('href'),
        type: "get",
        beforeSend: function  (){
            el.attr('disabled',true);
        },
        success: function (result){
          el.attr('disabled',false);
          if(result == 0)
          {
            el.removeClass().addClass("changestuts btn btn-success");
            el.html("  تفعيل <i class='fa fa-check'></i>");
          }else if(result == 1)
          {
            el.removeClass().addClass("changestuts btn btn-danger");
            el.html("  ايقاف <i class='fa fa-close'></i>");
          }

        }
      });
  });


    $(document).on('click','.delete', function (e){

      if( confirm('تاكيد ؟') )
      {
        return true;
      }else{
        return false;
      }

    });
  </script>
@endpush
