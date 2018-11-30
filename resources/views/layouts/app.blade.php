
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
  <link rel="stylesheet" href="/css/footer.css">


  <link rel="stylesheet" href="/css/supporters.css">
  <title>@{{ title }}</title>

  @yield('links')
  <!-- Font Awesome Icons -->
</head>
<body>

<div class="wrapper" id="app">

  <!-- Navbar -->
    @include('layouts.contents.navbar')

  <!-- /.navbar -->



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <div class="content">

        @yield('content')
    </div>
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('contents.supporters')
  @include('layouts.contents.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="/js/app.js"></script>
@yield('scripts')
</body>
</html>
