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
                        <div class="gg-element">
                            <img src="https://picsum.photos/1600/1300/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1600/1200/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1200/1600/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1600/1201/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1200/1601/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1201/1600/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1600/1310/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1602/1311/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1603/1311/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1602/1312/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1201/1601/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1201/1602/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1602/1313/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1602/1314/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1602/1315/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1602/1316/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1203/1602/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1605/1312/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1204/1602/?random">
                        </div>
                        <div class="gg-element">
                            <img src="https://picsum.photos/1205/1602/?random">
                        </div>
                    </div>

                </div>
            </div>
    </div>
    @include('contents.demands')
@endsection
@section('scripts')
    <script type="text/javascript" src="js/grid-gallery.min.js"></script>
@endsection