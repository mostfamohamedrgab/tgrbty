<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{ asset('public/admin/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- toast -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="{{asset('public/js/jquery.toast.js')}}"></script>
    <link href="{{asset('public/css/jquery.toast.css')}}" rel="stylesheet" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      h1, h2 ,h3 ,h4 ,h5 ,h6 {
        text-align: right !important
      }
      .text-r {
        text-align: right !important
      }
      select,option {
        direction: rtl;
        text-align: right !important;
      }
      table {
        padding: 10px;
        direction: rtl;
        background:#fff;
        box-shadow: 1px 1px 2px #eee,-1px -1px 2px #eee;
      }
      table thead td {
        font-weight: bolder;
      }

      input , textarea{
        text-align: right
      }
      .p-right{
        float: right;
        margin-bottom: 10px;
      }
      .p-right:after {
        content: "";
        clear: both;
      }
      .modal.fade .modal-body
      {
        text-align: right;
      }

    </style>
    @stack('css')
  </head>
