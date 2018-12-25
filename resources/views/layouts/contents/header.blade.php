<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html">
                    <img src="img/logo.png" alt="" style="max-width: 175px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <div class="row ml-0 w-100">
                        <div class="col-lg-12 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">home</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('demands')}}">Demands</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('events')}}">events</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">About</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('blogs')}}" class="nav-link">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('gallery')}}">Gallery</a>
                                </li>
                                 @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="/dashboard">Dashboard</a>
                                 </li>
                                  @else
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">Login</a>
                                 </li>
                                 @endauth
                                <li class="nav-item">
                                    <a class="main_btn" href="{{route('register')}}">Register now</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->