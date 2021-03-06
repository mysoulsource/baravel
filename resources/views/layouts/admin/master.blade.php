<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="token"   id="token" value="{{ auth()->check() ? auth()->user()->id : 'null' }}">

  <title>Paper Dashboard by Creative Tim</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('css/paper-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
   


    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('css/control-siderbar.css')}}">
    <style>
        .modal-backdrop{
         z-index:0;
        }
        .text-red{
            color:red;
        }
        .content .card .header{
            margin-bottom: 15px;
        }
        .content .card .footer{
            padding: 0 20px;
        }
    </style>
</head>
<body>

<div class="wrapper" id="app">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
  -->

      <div class="sidebar-wrapper">
            <div class="logo">
                <router-link to="/dashboard" class="simple-text">
                    Donors Nepal
                </router-link>
            </div>

            <ul class="nav">
                <li class="active">
                    <router-link to="/dashboard">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </router-link>
                </li>
                <li>
                    <router-link to="/userprofile">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </router-link>
                </li>
                <li>
                    <a href="/users">
                        <i class="fa fa-users"></i>
                        <p>Users List</p>
                    </a>
                </li>
                <li>
                    <a href="/userrequests">
                        <i class="ti-bookmark"></i>
                        <p>Requests</p>
                    </a>
                </li>
                <li>
                    <a href="/userdemands">
                        <i class="ti-pin-alt"></i>
                        <p>Demands</p>
                    </a>
                </li>
                <li>
                    <a href="/userdonate">
                        <i class="ti-pulse"></i>
                        <p>Donate</p>
                    </a>
                </li>
                 <li>
                        <a href="/adminevents">
                            <i class="fa fa-calendar"></i>
                            <p>All Events</p>
                        </a>
                    </li>
                    <li>
                        <a href="/adminaddevent">
                            <i class="fa fa-plus-square"></i>
                            <p>Add Event</p>
                        </a>
                    </li>
                    <li>
                        <a href="/adminblog">
                            <i class="fa fa-th"></i>
                            <p>Blog</p>
                        </a>
                    </li>
                    <li>
                        <a href="/adminaddpost">
                            <i class="fa fa-plus-square"></i>
                            <p>Add post</p>
                        </a>
                    </li>
                @can('isAdmin')
                <li>
                    <a href="/admindeveloper">
                        <i class="fa fa-cogs"></i>
                        <p>Developer</p>
                    </a>
                </li>
                    <li>
                        <a href="/adminnotice">
                            <i class="fa fa-exclamation"></i>
                            <p>Notice</p>
                        </a>
                    </li>
                    <li>
                        <a href="/adminbloods">
                            <i class="fa fa-heart-o"></i>
                            <p>Blood Group</p>
                        </a>
                    </li>
                    <li>
                        <a href="/admingallery">
                            <i class="fa fa-camera"></i>
                            <p>Gallery</p>
                        </a>
                    </li>
                   
                    <li>
                        <a href="/admincategory">
                            <i class="fa fa-list"></i>
                            <p>Blog Category</p>
                        </a>
                    </li>
                    <li>
                        <a href="/adminbanner">
                            <i class="fa fa-picture-o"></i>
                            <p>Banner</p>
                        </a>
                    </li>
                    <li>
                        <a href="/adminbanner">
                            <i class="fa fa-picture-o"></i>
                            <p>Banner</p>
                        </a>
                    </li>
                @endcan
            </ul>
      </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
                <p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
                  <p>Notifications</p>
                  <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
            <li>
                            <a href="#">
                <i class="ti-settings"></i>
                <p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <router-view></router-view>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">

                </div>
            </div>
        </footer>

    </div>
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title">Sidebar Background</li>
                <li class="adjustments-line text-center">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <span class="badge filter badge-white active" data-color="white"></span>
                        <span class="badge filter badge-black" data-color="black"></span>
                    </a>
                </li>

                <li class="header-title">Sidebar Active Color</li>
                <li class="adjustments-line text-center">
                    <a href="javascript:void(0)" class="switch-trigger active-color">
                        <span class="badge filter badge-primary" data-color="primary"></span>
                        <span class="badge filter badge-info" data-color="info"></span>
                        <span class="badge filter badge-success" data-color="success"></span>
                        <span class="badge filter badge-warning" data-color="warning"></span>
                        <span class="badge filter badge-danger active" data-color="danger"></span>
                    </a>
                </li>

                <li class="button-container">
                    <div class="">
                        <a href="http://www.creative-tim.com/product/paper-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download for Free</a>
                    </div>
                </li>

                <li class="header-title">Want More Components?</li>
                <li class="button-container">
                    <div class="">
                        <a href="http://www.creative-tim.com/product/paper-dashboard-pro?ref=pd-free-upgrade-live" target="_blank" class="btn btn-danger btn-block btn-fill">Get PRO Version!</a>
                    </div>
                </li>

                <li class="header-title">Thank you for sharing!</li>

                <li class="button-container">
                    <button id="twitter" class="btn btn-social btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> </button>
                    <button id="facebook" class="btn btn-social btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i></button>
                </li>

            </ul>
        </div>
    </div>
    </div>

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
                        Status<span class="float-right badge "><button v-bind:class="{ active: isActiveStatus }" @click="changeStatus" type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                  <div class="handle"></div>
                </button></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Information <span class="float-right badge"><button v-bind:class="{active : infoStatus}" @click="changeInfoStatus" type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                    <div class="handle"></div></button></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
</div>



</body>

    <!--   Core JS Files   -->
    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

  <!--  Checkbox, Radio & Switch Plugins -->
  <script src="{{asset('js/bootstrap-checkbox-radio.js')}}"></script>

  <!--  Charts Plugin -->
  <script src="{{asset('js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{asset('js/bootstrap-notify.js')}}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
  <script src="{{asset('js/paper-dashboard.js')}}"></script>

  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('js/demo.js')}}"></script>

  <script type="text/javascript">
      // $(document).ready(function(){
      //
      //     demo.initChartist();
      //
      //     $.notify({
      //         icon: 'ti-gift',
      //         message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."
      //
      //       },{
      //           type: 'success',
      //           timer: 4000
      //       });
      //
      // });
  </script>
  <script>
   @auth
    window.authuser = @json(auth()->user());
  @endauth
</script>
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('js/push.js')}}"></script>
<script src="{{asset('js/serviceWorker.min.js')}}"></script>


</html>
