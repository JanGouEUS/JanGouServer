@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>{{ __('createTaberna.title') }}</h1> --}}

@stop

@section('content')
<lagun-chat> </lagun-chat>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.js"></script>
@stop