@extends('layouts.app')
@section('links')
    <link rel="stylesheet/less" type="text/css" href="/css/slick.less">
    <link rel="stylesheet/less" type="text/css" href="/css/slick-theme.less">
    <link rel="stylesheet" href="{{asset('/css/banner.css')}}">
    <link rel="stylesheet" href="{{asset('/css/services.css')}}">
    <link rel="stylesheet" href="{{asset('/css/counter.css')}}">
    <link rel="stylesheet" href="{{asset('/css/demands.css')}}">
@endsection
@section('content')
    @include('contents.banner')
    @include('contents.counter')
    @include('contents.demands')
    @include('contents.services')

@endsection
@section('scripts')
    <script src="{{asset('/js/counter.js')}}"></script>
@endsection