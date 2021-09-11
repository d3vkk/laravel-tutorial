{{--
    Blades are basically templates that provide an easier
    way of mixing HTML with PHP
    Layouts act as dynamic templates and help you to avoid repetitive pages
 --}}
<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{--
            CSRF protected i.e. one cannot submit
            from anywhere else other than using
            the form's submit button
        --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Linking files in the public folder directly --}}
        <link rel="stylesheet" href="{{asset('vendor/tailwind.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        {{--
            The title will use the app name specified
            in the environment variables (in the .env file)
            & if it can't find it, it'll use 'LSAPP'
        --}}
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body class="cust-gray-100">
        {{-- How to include a page component --}}
        @include('inc.navbar')
        <main class="container p-10">
            @include('inc.messages')
            @yield('content')
        </main>
    </body>
</html>
