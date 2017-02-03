@extends('layouts.master')

@section('layout')
    <div class="col-xs-12 col-sm-4 col-md-3">
        @yield('sidebar')
    </div>
    <div class="cols-xs-12 cols-sm-8 col-md-9">
        @yield('content')
    </div>
@endsection