@extends('layouts.app')
@section('content')
  <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Blogs</h2>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="#">Blogs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
            <div class="row">
                @forelse($categories as $category)
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{asset('img/category/'.$category->image)}}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="single-blog.html">
                                    <h5>{{$category->name}}</h5>
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
    <!--================Blog Categorie Area =================-->
       
    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @forelse($posts as $post)
                        <article class="row blog_item">
                            <div class="col-md-3">
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
                                            <a href="#">1.2M Views
                                                <i class="lnr lnr-eye"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">{{$post->comments_count}} Comments
                                                <i class="lnr lnr-bubble"></i>
                                          
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{asset('img/posts/'.$post->image)}}" alt="">
                                    <div class="blog_details">
                                        <a href="single-blog.html">
                                            <h2>{{$post->title}}</h2>
                                        </a>
                                        <p>{{$post->content}}</p>
                                        <a href="{{route('blog.single',$post->id)}}" class="white_bg_btn">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                         @empty
                            @endforelse
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                {{$posts->links()}}
                            </ul>
                        </nav>
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
                                <img class="img-fluid" src="img/blog/add.jpg" alt="">
                            </a>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Post Catgories</h4>
                            <ul class="list cat-list">
                                    @forelse($categories_list as $category_list)
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>{{$category_list->name}}</p>
                                        <p>{{$category_list->posts_count}}</p>
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
    <!--================Blog Area =================-->


@endsection