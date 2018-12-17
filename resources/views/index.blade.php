@extends('layouts.app')
@section('content')

    @include('layouts.contents.banner')
<!--================ Start important-points section =================-->
<section class="donation_details pad_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 single_donation_box">
                <img src="img/icons/home1.png" alt="">
                <h4>Total Donation</h4>
                <p>
                    The French Revolutioncons tituted for the conscience of the dominant.
                </p>
            </div>
            <div class="col-lg-3 col-md-6 single_donation_box">
                <img src="img/icons/home2.png" alt="">
                <h4>Fund Raised</h4>
                <p>
                    The French Revolutioncons tituted for the conscience of the dominant.
                </p>
            </div>
            <div class="col-lg-3 col-md-6 single_donation_box">
                <img src="img/icons/home3.png" alt="">
                <h4>Highest Donation</h4>
                <p>
                    The French Revolutioncons tituted for the conscience of the dominant.
                </p>
            </div>
            <div class="col-lg-3 col-md-6 single_donation_box">
                <img src="img/icons/home4.png" alt="">
                <h4>Total Donation</h4>
                <p>
                    The French Revolutioncons tituted for the conscience of the dominant.
                </p>
            </div>
        </div>
    </div>
</section>
<!--================ End important-points section =================-->

<!--================ Start Our Major Cause section =================-->
<section class="our_major_cause section_gap">
    <div class="container">
        <div class="row justify-content-center section-title-wrap">
            <div class="col-lg-12">
                <h1>Blood Demands</h1>
                <p>
                    The French Revolution constituted for the conscience of the dominant aristocratic class a fall from innocence the natural
                    chain of events.
                </p>
            </div>
        </div>

        <div class="row">
            <div id="our-major-cause" class="owl-carousel">
                @foreach($demands as $demand)
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
                            <a href="#" class="main_btn2">Aceept</a>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</section>
<!--================ Ens Our Major Cause section =================-->

<!--================ Start Make Donation Area =================-->
<section class="make_donation section_gap">
    <div class="container">
        <div class="row justify-content-start section-title-wrap">
            <div class="col-lg-12">
                <h1>Make a Donation Today</h1>
                <p>
                    Las Vegas has more than 100,000 hotel rooms to choose from. There is something for every budget, and enough.
                </p>
            </div>
        </div>

        <div class="donate_now_wrapper">
            <form>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="donate_box mb-30">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="donation" id="ten_doller">
                                <label class="form-check-label d-flex justify-content-between" for="ten_doller">
                                    <div class="label_text">
                                        $10.00
                                    </div>
                                    <div class="label_text">
                                        USD
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="donate_box mb-30">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="donation" id="fifty_doller">
                                <label class="form-check-label d-flex justify-content-between" for="fifty_doller">
                                    <div class="label_text">
                                        $50.00
                                    </div>
                                    <div class="label_text">
                                        USD
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="donate_box mb-30">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="donation" id="hundred_doller">
                                <label class="form-check-label d-flex justify-content-between" for="hundred_doller">
                                    <div class="label_text">
                                        $100.00
                                    </div>
                                    <div class="label_text">
                                        USD
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="donate_box">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="donation" id="two_fifty__doller">
                                <label class="form-check-label d-flex justify-content-between" for="two_fifty__doller">
                                    <div class="label_text">
                                        $250.00
                                    </div>
                                    <div class="label_text">
                                        USD
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="donate_box">
                            <div class="form-group">
                                <input type="text" placeholder="Others" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Others'" class="form-control">
                                <span class="fs-14">USD</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="donate_box">
                            <button type="submit" class="main_btn w-100">donate now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================ End Make Donation Area =================-->

    <section class="recent_event section_gap_custom">
        <div class="container">
            <div class="row justify-content-center section-title-wrap">
                <div class="col-lg-12">
                    <h1>Support a campaign or fundraiser</h1>
                    <p>
                        The French Revolution constituted for the conscience of the dominant aristocratic class a fall from innocence the natural
                        chain of events.
                    </p>
                </div>
            </div>
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
                                        <a href="event-details.html">{{$event->title}}</a>
                                    </h4>
                                    <p>{{$event->detail}} </p>
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
<!--================ End Support Campaing Area =================-->

<!--================ Start Experience Area =================-->
<section class="experience_donation section_gap">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <h1>Experience How your Donation Can Reach</h1>
                <p>he French Revolution constituted for the conscience of the dominant aristocratic class a fall from innocence, and upturning
                    of the natural chain of events that resounded.</p>
                <a href="#" class="main_btn2 mr-10">make donation now</a>
                <a href="#" class="main_btn2">Create Fundraising today</a>
            </div>
        </div>
    </div>
</section>
<!--================ End Experience Area =================-->
    @include('layouts.contents.client')


    @endsection
