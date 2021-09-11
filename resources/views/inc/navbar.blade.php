<nav class="p-2 m-0 text-white shadow-md cust-blue">
    <a href="/" target="_self" class="m-2 text-2xl font-light tracking-wide">{{config('app.name', 'LSAPP')}}</a>
    {{-- Alternative way to set url --}}
    {{-- <a href="{{ url('/') }}" target="_self" class="m-2 text-2xl font-light tracking-wide">{{config('app.name', 'LSAPP')}}</a> --}}
    <a href="/about" target="_self" class="m-1">About</a>
    <a href="/services" target="_self" class="m-1">Services</a>
    <a href="/posts" target="_self" class="m-1">Blog</a>
    {{--
        Below, the login, register, dashboard & logout
        buttons are conditionally displayed
    --}}
    @guest
    <a href="/login" class="m-1">Login</a>
    @if (Route::has('register'))
    <a href="/register" class="m-1">Register</a>
    <div class="mt-1">
    @endif
    @else
        <a href="/dashboard" class="m-1">Dashboard</a>
        <a href="/logout" class="m-1"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <span class="p-1 text-yellow-500 border-2 border-yellow-500 rounded-lg">
            {{ Auth::user()->name }}</span>
    @endguest
    </div>
</nav>
