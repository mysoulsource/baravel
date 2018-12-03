@extends('layouts.app')
@section('links')
    <link rel="stylesheet" href="css/grid-gallery.min.css">
    <link rel="stylesheet" href="css/demands.css">
@endsection
@section('content')
    <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Gallery</h3>
                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-md-12">
                    <div class="gg-box">
                        @foreach($gallerys as $gallery)
                        <div class="gg-element">
                            <img src="{{asset('img/gallery/'. $gallery->image)}}">
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
    </div>
    @include('contents.demands')
@endsection
@section('scripts')
    <script type="text/javascript" src="js/grid-gallery.min.js"></script>
@endsection