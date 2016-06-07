@extends('app')
@section('customcss')
{!! HTML::style('css/blog/index.css') !!}
@endsection
@section('customjs')
{!! HTML::script('js/blog/index.js') !!}
@endsection
@section('content')
    @include("partials/_list_blog")

@endsection
