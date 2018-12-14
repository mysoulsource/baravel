
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="token"   id="token" value="{{ auth()->check() ? auth()->user()->id : 'null' }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/btn.css">
  <title>Baravel</title>

  <!-- Font Awesome Icons -->
  <style>
    .nav-sidebar > .nav-item .nav-icon {
      color: lawngreen;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  {{--<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">--}}
    {{--<!-- Left navbar links -->--}}
    {{--<ul class="navbar-nav">--}}
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>--}}
      {{--</li>--}}
    {{--</ul>--}}

    {{--<!-- SEARCH FORM -->--}}

    {{--<div class="input-group input-group-sm">--}}
      {{--<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" v-model="search" @keyup="searchfun">--}}
      {{--<div class="input-group-append">--}}
        {{--<button class="btn btn-navbar" type="submit" @click ="searchfun">--}}
          {{--<i class="fa fa-search"></i>--}}
        {{--</button>--}}
      {{--</div>--}}
    {{--</div>--}}


  {{--</nav>--}}
  <nav class="main-header navbar navbar-expand border-bottom navbar-dark bg-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" v-model="search" @keyup="searchfun">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit" @click ="searchfun">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/img/logo.png" alt="Baravel Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Baravel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset('img/profile/'. Auth()->user()->img)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{Auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="/users" class="nav-link text-red">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
                <span class="right badge badge-success">{{$users}}</span>
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="/userdemands" class="nav-link">
              <i class="nav-icon fas fa-life-ring"></i>
              <p>
               Demands
                <span class="right badge badge-success">{{$demands}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/userrequests" class="nav-link">
              <i class="nav-icon fas fa-hands-helping"></i>
              <p>
                Requests
                <span class="right badge badge-success">{{$requests}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/userdonate" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-heart"></i>
              <p>
                Donate
                <span class="right badge badge-success">{{$donates}}</span>
              </p>
            </a>
          </li>
           @can('isAdmin')
           <li class="nav-item">
            <a href="/admindeveloper" class="nav-link">
              <i class="nav-icon fas fa-stream"></i>
              <p>
               Developer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/adminnotice" class="nav-link">
              <i class="nav-icon fas fa-flag-checkered"></i>
              <p>
               Notice
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/adminbloods" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
               Bloods
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admingallery" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
               Gallery
                <span class="right badge badge-success">{{$gallery}}</span>
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
               Events
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/events/admin" class="nav-link active">
                  <i class="fas fa-calendar-week nav-icon"></i>
                  <p>All Events <span class="right badge badge-success">{{$events}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/adminaddevent" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add new</p>
                </a>
              </li>

            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Blogs
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/adminblog" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>All Blogs  <span class="right badge badge-success">{{$posts}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admincategory" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>All category <span class="right badge badge-success">{{$category}}</span></p>
                </a>
              </li>

            </ul>
          </li>
          @endcan
          <li class="nav-item">
            <a  class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
               Logout
              </p>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </a>
          </li>
         
         
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
           @yield('content')
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
    <!-- Control sidebar content goes here -->

      <div class="card card-widget widget-user-2">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-warning">
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="{{asset('img/profile/'. Auth()->user()->img)}}" alt="User Avatar">
          </div>
          <!-- /.widget-user-image -->
          <h6 class="widget-user-username">{{auth()->user()->name}}</h6>
          <h6 class="widget-user-desc">{{auth()->user()->email}}</h6>
        </div>
        <div class="card-footer p-0">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="#" class="nav-link">
                Blood Group <span class="float-right badge bg-primary">{{ $bloodname }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                Points <span class="float-right badge bg-info">{{$point}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
               Status<span class="float-right badge "><button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                  <div class="handle"></div>
                </button></span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                Information <span class="float-right badge"><button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                    <div class="handle"></div></button></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>
   @auth
    window.authuser = @json(auth()->user());
  @endauth
</script>
<script src="/js/app.js"></script>
</body>
</html>
