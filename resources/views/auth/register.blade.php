@extends('layouts.app')

@section('content')
<div class="mb-6 text-2xl bold">Register</div>
{{-- Alternatively, --}}
{{-- <span class="text-2xl bold">{{ __('Register') }}</span> --}}

<form method="POST" action="/register">
    {{-- Alternatively, --}}
    {{-- <form method="POST" action="{{ route('register') }}"> --}}
    @csrf

    <input id="name" type="text" class="bg-gray-200 shadow w-full p-2 mt-2 mb-6 @error('name') is-invalid @enderror"
        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

    @error('name')
    <div class="text-red-500 bg-red-200" role="alert">
        {{ $message }}
    </div>
    @enderror

    <input id="email" type="email" class="bg-gray-200 shadow w-full p-2 mt-2 mb-6 @error('email') is-invalid @enderror"
        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">

    @error('email')
    <div class="text-red-500 bg-red-200" role="alert">
        {{ $message }}
    </div>
    @enderror

    <input id="password" type="password"
        class="bg-gray-200 shadow w-full p-2 mt-2 mb-6 @error('password') is-invalid @enderror" name="password" required
        autocomplete="new-password" placeholder="Password">

    @error('password')
    <div class="text-red-500 bg-red-200" role="alert">
        {{ $message }}
    </div>
    @enderror

    <input id="password-confirm" type="password" class="w-full p-2 mt-2 mb-6 bg-gray-200 shadow"
        name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

    <button type="submit" class="p-2 text-black rounded-lg shadow-lg cust-yellow">Register</button>
    @endsection
</form>
