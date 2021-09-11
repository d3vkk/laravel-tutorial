@extends('layouts.app')
@section('content')
    <div class="flex flex-row mb-4">
        <a href="/posts" class="p-2 mr-2 rounded-lg shadow-lg cust-yellow">Go Back</a>
        {{--
            Restricts access to posts
            if user is not logged in
            And if the user's id does
            not match the post's
        --}}
        @if (!Auth::guest())
            @if (Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="p-2 mr-2 rounded-lg shadow-lg cust-yellow"">Edit</a>
                {{-- Form is needed so as to spoof a DELETE request --}}
                {!! Form::open(['action'=>['PostController@destroy', $post->id], 'method' => 'POST']) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete', ['class'=>'mr-2 p-2 cust-red shadow-lg rounded-lg']) !!}
                {!! Form::close() !!}
            @endif
        @endif
    </div>
    <div class="w-full my-4 shadow">
        <img width="200" height="0" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->cover_image}}">
    </div>
    <h1 class="text-3xl bold">{{$post->title}}</h1>
    <span>by <span class="uppercase">{{$post->user->name}}</span></span>
    &downharpoonright;
    <small>Written on {{$post->created_at}}</small>
    &bull;
    <small>Last updated on {{$post->updated_at}}</small>
    <div class="mt-8 text-xl">
        {{$post->body}}
        {{-- To parse HTML --}}
        {{-- {!!$post->body!!} --}}
    </div>
@endsection
