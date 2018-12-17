@extends('layouts.app')
<!--================ Start Recent Event Area =================-->
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Events</h2>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="{{route('events')}}">Events</a>
                        <a href="#">Event Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="event_details section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <img src="{{asset('img/events/'.$event->img)}}" alt="" class="img-fluid">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="event_content">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left_content">
                                    <p>
                                        <i class="lnr lnr-calendar-full"></i>
                                       {{$event->date}}
                                    </p>
                                    <p>
                                        <i class="lnr lnr-apartment"></i>
                                        {{$event->organizer}}
                                    </p>
                                    <p>
                                        <i class="lnr lnr-location"></i>
                                       {{$event->location}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="right_content">
                                    <h3>{{$event->title}}</h3>
                                    <p>{{$event->detail}}</p>
                                    <p>sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection