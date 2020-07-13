@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحه التحكم
          </h1>
        </section>
        <hr style="border-color:#fff"/>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">الرسائل</span>
                  <span class="info-box-number">{{$msgsCount}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">
                    الاعضاء
                  </span>
                  <span class="info-box-number">{{$usersCount}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->


            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">
                    التجارب
                  </span>
                  <span class="info-box-number">{{$experienceCount}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->


          </div>

        <canvas id="myChart" width="400" height="400"></canvas>
@stop
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! $users->pluck('name')  !!},
        datasets: [{
            label: 'احصائيات الاعضاء',
            data: {!!  $users->pluck('created')  !!},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(100, 159, 64, 0.2)',
                'rgba(120, 159, 64, 0.2)',
                'rgba(110, 159, 64, 0.2)',
                'rgba(190, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(100, 159, 64, 0.2)',
                'rgba(120, 159, 64, 0.2)',
                'rgba(110, 159, 64, 0.2)',
                'rgba(190, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(100, 159, 64, 0.2)',
                'rgba(120, 159, 64, 0.2)',
                'rgba(110, 159, 64, 0.2)',
                'rgba(190, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(100, 159, 64, 0.2)',
                'rgba(120, 159, 64, 0.2)',
                'rgba(110, 159, 64, 0.2)',
                'rgba(190, 159, 64, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endpush
@push('css')
  <style>
    canvas {
      display: none
    }

  </style>
@endpush
