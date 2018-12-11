@extends('layouts.app')

@section('content')
    @include('layouts.contents.banner')
    <div class="container">


    <div class="section-top-border">
        <h3 class="title_color">Image Gallery</h3>
        <div class="row gallery-item">
            <div class="col-md-4">
                <a href="img/elements/g1.jpg" class="img-gal">
                    <div class="single-gallery-image" style="background: url({{asset('img/elements/g1.jpg')}})"></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="img/elements/g2.jpg" class="img-gal">
                    <div class="single-gallery-image" style="background: url({{asset('img/elements/g2.jpg')}})"></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="img/elements/g3.jpg" class="img-gal">
                    <div class="single-gallery-image" style="background: url({{asset('img/elements/g3.jpg')}})"></div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="img/elements/g4.jpg" class="img-gal">
                    <div class="single-gallery-image" style="background: url({{asset('img/elements/g4.jpg')}})"></div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="img/elements/g5.jpg" class="img-gal">
                    <div class="single-gallery-image" style="background: url({{asset('img/elements/g5.jpg')}})"></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="img/elements/g6.jpg" class="img-gal">
                    <div class="single-gallery-image" style="background: url({{asset('img/elements/g6.jpg')}})"></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="img/elements/g7.jpg" class="img-gal">
                    <div class="single-gallery-image" style="background: url({{asset('img/elements/g7.jpg')}})"></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="img/elements/g8.jpg" class="img-gal">
                    <div class="single-gallery-image" style="background: url({{asset('img/elements/g1.jpg')}})"></div>
                </a>
            </div>
        </div>
    </div>
    </div>
    @include('layouts.contents.client')
@endsection
