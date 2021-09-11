{{-- Points to the 'app' page in the layouts folder --}}
@extends('layouts.app')
@section('content')
    <div class="p-6 text-white rounded-sm cust-blue">
        <h1 class="text-4xl font-light">{{$title}}</h1>
        {{-- OR --}}
        <h1><?php //echo $title; ?></h1>
    </div>
@endsection
