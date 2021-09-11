@extends('layouts.app')
@section('content')
    <h1 class="text-2xl bold">{{$title}}</h1>
    {{-- How to iterate through a list in blade --}}
    <ul>
    @if(count($services)>0)
        @foreach ($services as $service)
            <li class="container m-2 p-4 shadow-md cust-blue text-white">{{$service}}</li>
        @endforeach
    @endif
    </ul>
@endsection
