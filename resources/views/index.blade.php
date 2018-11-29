@extends('layouts.app')
@section('links')
    <link rel="stylesheet/less" type="text/css" href="/css/slick.less">
    <link rel="stylesheet/less" type="text/css" href="/css/slick-theme.less">
    <link rel="stylesheet" href="/css/banner.css">
    <link rel="stylesheet" href="/css/services.css">
    <link rel="stylesheet" href="/css/counter.css">
    <link rel="stylesheet" href="/css/demands.css">
@endsection
@section('content')
    @include('contents.banner')
    @include('contents.counter')
    @include('contents.demands')
    @include('contents.services')
    <div class="container">
        <div class="row">

        </div>
    </div>

@endsection
@section('scripts')
    <script src="/js/counter.js"></script>
@endsection