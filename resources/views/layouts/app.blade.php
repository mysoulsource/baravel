
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
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
  <link rel="stylesheet" href="{{asset('/css/footer.css')}}">


  <link rel="stylesheet" href="{{asset('/css/supporters.css')}}">
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

<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/banner.js')}}"></script>
@yield('scripts')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5c06bb0afd65052a5c93bef9/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
