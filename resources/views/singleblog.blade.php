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
                    <h2>Blogs</h2>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="{{route('blogs')}}">Home</a>
                        <a href="#">Blog Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{asset('img/Singlepost/'.$post->image)}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                   <p>{{$post->tags}}</p>
                                </div>
                                <ul class="blog_meta list">
                                    <li>
                                        <a href="#">{{$post->user->name}}
                                            <i class="lnr lnr-user"></i>
                                     
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">{{$post->created_at}}
                                            <i class="lnr lnr-calendar-full"></i>
                                        
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">{{$count}} Views
                                            <i class="lnr lnr-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">{{$post->comments_count}} Comments
                                            <i class="lnr lnr-bubble"></i>
                                       
                                        </a>
                                    </li>
                                </ul>
                                <ul class="social-links">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-github"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-behance"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{$post->title}}</h2>
                            <p class="excert">
                                {{$post->content}}
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <div class="quotes">
                                MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
                                on boot camp when you can get the MCSE study materials yourself at a fraction of the camp
                                price. However, who has the willpower to actually sit through a self-imposed MCSE training.
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <img class="img-fluid" src="img/blog/post-img1.jpg" alt="">
                                </div>
                                <div class="col-6">
                                    <img class="img-fluid" src="img/blog/post-img2.jpg" alt="">
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <p>
                                        MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
                                        on boot camp when you can get the MCSE study materials yourself at a fraction of
                                        the camp price. However, who has the willpower.
                                    </p>
                                    <p>
                                        MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
                                        on boot camp when you can get the MCSE study materials yourself at a fraction of
                                        the camp price. However, who has the willpower.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4></h4>
                        <div class="comment-list">
                            {{--@forelse($comments as $comment)--}}
                            {{--<div class="single-comment justify-content-between d-flex">--}}
                                {{--<div class="user justify-content-between d-flex">--}}
                                    {{--<div class="thumb">--}}
                                        {{--<img src="{{asset('img/users/'.$comment->user->img)}}" alt="">--}}
                                    {{--</div>--}}
                                    {{--<div class="desc">--}}
                                        {{--<h5>--}}
                                            {{--<a href="#">{{$comment->user->name}}</a>--}}
                                        {{--</h5>--}}
                                        {{--<p class="date">{{$comment->created_at}} </p>--}}
                                        {{--<p class="comment">--}}
                                            {{--{{$comment->content}}--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                                {{--@empty--}}
                                {{--<p class="comment">No comments</p>--}}
                                {{--@endforelse--}}
                            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="10"></div>
                        </div>
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
                            <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                            <h4>Charlie Barber</h4>
                            <p>Senior blog writer</p>
                            <div class="social_icon">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-github"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-behance"></i>
                                </a>
                            </div>
                            <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should
                                have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
                                detractors.
                            </p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Popular Posts</h3>
                            @forelse($popular_posts as $popular_post)
                            <div class="media post_item">
                                <img src="{{asset('img/small/'.$popular_post->image)}}" alt="post">
                                <div class="media-body">
                                    <a href="{{route('blog.single',$popular_post->id)}}">
                                        <h3>{{$popular_post->title}}</h3>
                                    </a>
                                    <p>{{$popular_post->created_at}}</p>
                                </div>
                            </div>
                            @empty
                                @endforelse
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget ads_widget">
                            <a href="#">
                                <img class="img-fluid" src="{{asset('img/blog/add.jpg')}}" alt="">
                            </a>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Post Catgories</h4>
                            <ul class="list cat-list">
                                @forelse($categories as $category)
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>{{$category->name}}</p>
                                        <p>{{$category->posts_count}}</p>
                                    </a>
                                </li>
                                @empty
                                    @endforelse
                            </ul>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <p>
                                Here, I focus on a range of items and features that we use in life without giving them a second thought.
                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'">
                                </div>
                                <a href="#" class="bbtns">Subcribe</a>
                            </div>
                            <p class="text-bottom">You can unsubscribe at any time</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">Technology</a>
                                </li>
                                <li>
                                    <a href="#">Fashion</a>
                                </li>
                                <li>
                                    <a href="#">Architecture</a>
                                </li>
                                <li>
                                    <a href="#">Fashion</a>
                                </li>
                                <li>
                                    <a href="#">Food</a>
                                </li>
                                <li>
                                    <a href="#">Technology</a>
                                </li>
                                <li>
                                    <a href="#">Lifestyle</a>
                                </li>
                                <li>
                                    <a href="#">Art</a>
                                </li>
                                <li>
                                    <a href="#">Adventure</a>
                                </li>
                                <li>
                                    <a href="#">Food</a>
                                </li>
                                <li>
                                    <a href="#">Lifestyle</a>
                                </li>
                                <li>
                                    <a href="#">Adventure</a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection