@extends('layouts.sidebarred)

@section('sidebar')
    @include('endpoints.sidebar)
@endsection

@section('content')
    @include('endpoints.description')

    @foreach($endpoints as $endpoint)
        @include('endpoints.single')
    @endforeach
@endsection