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
                        <a href="#">Events</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<section class="recent_event section_gap_custom">
    <div class="container">
        <div class="row">
            @forelse($events as $event)
            <div class="col-lg-6">
                <div class="single_event">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            <figure>
                                <img class="img-fluid w-100" src="{{asset('img/events/'.$event->img)}}" alt="">
                                <div class="img-overlay"></div>
                            </figure>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="content_wrapper">
                                <p class="date_time">{{$event->date}}</p>
                                <h4 class="title">
                                    <a href="{{route('event.single',$event->id)}}">{{$event->title}}</a>
                                </h4>
                                <p>{{$event->detail}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
               @endforelse
        </div>
    </div>
</section>
    @endsection