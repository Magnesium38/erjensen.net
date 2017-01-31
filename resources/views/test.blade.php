@extends('layouts.master')

@section('content')
    @foreach ($endpoints as $endpoint)
        @include('endpoints.single')
    @endforeach
@endsection
