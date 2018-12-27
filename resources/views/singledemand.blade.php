@extends('layouts.app')
@section('content')
 <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=329667757622211&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
  <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Demands</h2>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="#">Demand</a>
                        <a href="#">Demand Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blood Group Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
            <div class="row">
                @forelse($bloodgroups as $bloodgroup)
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{asset('img/bloodgroup/'.$bloodgroup->image)}}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="single-blog.html">
                                    <h5>{{$bloodgroup->detail}}</h5>
                                </a>
                                <div class="border_line"></div>
                               <!--  <p>Enjoy your social life together</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!--================Blood Group Area =================-->
       
            
    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                       
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                      <p></p>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li>
                                            <a href="#">{{$demand->user->name}}
                                                <i class="lnr lnr-user"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">{{$demand->date}}
                                                <i class="lnr lnr-calendar-full"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">{{$demand->location}}
                                                <i class="lnr lnr-eye"></i>
                                            
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">{{$demand->bloodName->name}}
                                                <i class="lnr lnr-bubble"></i>
                                          
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{asset('img/singlebloodgroup/'.$demand->bloodName->image)}}" alt="">
                                    <div class="blog_details">
                                        <a href="single-blog.html">
                                            <h2>{{$demand->title}}</h2>
                                        </a>
                                        <p>{{$demand->detail}}</p>
                                        <a href="" class="white_bg_btn">Accept</a>
                                    </div>
                                </div>
                                 <div class="comments-area">
                                        <div class="comment-list">
                                            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="10"></div>
                                        </div>
                                    </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="lnr lnr-magnifier"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="{{asset('img/small/'.$demand->user->img)}}" alt="">
                            <h4>{{$demand->user->name}}</h4>
                            <p>{{$demand->user->country}}</p>
                            <div class="social_icon">
                                <a href="{{$demand->user->f_url}}">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div>
                            <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should
                                have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
                                detractors.
                            </p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Urgent Demands</h3>
                            @forelse($urgentDemands as $urgentDemand)
                            <div class="media post_item">
                                <img src="{{asset('img/small/'.$urgentDemand->bloodName->image)}}" alt="post">
                                <div class="media-body">
                                    <a href="{{route('single.demand',$urgentDemand->id)}}">
                                        <h3>{{$urgentDemand->title}}</h3>
                                    </a>
                                    <p>{{$urgentDemand->date}}</p>
                                </div>
                            </div>
                            @empty
                                @endforelse
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget ads_widget">
                            <a href="#">
                                <img class="img-fluid" src="img/blog/add.jpg" alt="">
                            </a>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Demands according to BloodGroup</h4>
                            <ul class="list cat-list">
                                    @forelse($demandsCounts as $demandsCount)
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>{{$demandsCount->name}}</p>
                                        <p>{{$demandsCount->demands_count}}</p>
                                    </a>
                                </li>
                                 @empty
                                @endforelse
                            </ul>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


@endsection