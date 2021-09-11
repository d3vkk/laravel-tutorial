@extends('layouts.app')

@section('content')
<div class="mb-6 text-2xl bold">Login</div>
<form method="POST" action="/login">
    @csrf
    <input id="email" type="email" class="bg-gray-200 shadow w-full p-2 mt-2 mb-6 @error('email') is-invalid @enderror"
        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">

    @error('email')
    <div class="text-red-500 bg-red-200" role="alert">
        {{ $message }}
    </div>
    @enderror

    <input id="password" type="password"
        class="bg-gray-200 shadow w-full p-2 mt-2 mb-6 @error('password') is-invalid @enderror" name="password" required
        autocomplete="current-password" placeholder="Password">

    @error('password')
    <div class="text-red-500 bg-red-200" role="alert">
        {{ $message }}
    </div>
    @enderror

    <div>
        <input class="p-2 mt-2 mb-6 bg-gray-200 shadow" type="checkbox" name="remember" id="remember"
            {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Remember Me</label>
    </div>

    <button type="submit" class="p-2 text-black rounded-lg shadow-lg cust-yellow">Login</button>
    @if (Route::has('password.request'))
    <a class="ml-10 hover:underline" href="{{ route('password.request') }}">Forgot Your Password?</a>
    @endif
</form>
@endsection
