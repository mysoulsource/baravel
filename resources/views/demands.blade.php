@extends('layouts.app')

@section('content')

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Demands</h2>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="#">Demands</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================ Start Our Major Cause section =================-->
    <section class="our_major_cause section_gap_custom">
        <div class="container">
            <div class="row">
                @forelse($demands as $demand)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <figure>
                                <img class="card-img-top img-fluid" src="{{asset('img/bloods/'.$demand->bloodName->image)}}" alt="Card image cap">
                            </figure>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: 76%;">
                                    <span>Date : {{$demand->date}}</span>
                                </div>
                            </div>
                            <div class="card_inner_body">
                                <div class="card-body-top">
                                    <span>Location : </span> {{$demand->location}}
                                </div>
                                <h4 class="card-title">{{$demand->title}}</h4>
                                <p class="card-text">{{$demand->detail}}
                                </p>
                                <a href="#" class="main_btn2">donate here</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!--================ Ens Our Major Cause section =================-->
    @include('layouts.contents.client')

    @endsection