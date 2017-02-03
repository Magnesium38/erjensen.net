@extends('layouts.sidebarred')

@section('sidebar')
    @include('layouts.partials.sidebar')
@endsection

@section('content')
    @foreach ($endpoints as $endpoint)
        @include('endpoints.single')
    @endforeach
@endsection
