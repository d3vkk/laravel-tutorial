@if (count($errors) > 0)
    {{-- 'all()'' function is used since errors is an object --}}
    @foreach ($errors->all() as $error)
        <div class="w-full p-4 my-2 text-red-500 bg-red-200 rounded-lg">
            {{$error}}
        </div>
    @endforeach

@endif

{{-- How you check a session --}}
@if (session('success'))
    <div class="w-full p-4 my-2 text-green-500 bg-green-200 rounded-lg">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="w-full p-4 my-2 text-red-500 bg-red-200 rounded-lg">
        {{session('error')}}
    </div>
@endif
