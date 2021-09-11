@extends('layouts.app')
@section('content')
    <div>
        <span class="mr-4 text-2xl bold">Posts</span>
        <a href="/posts/create" target="_self" class="p-2 m-2 rounded-lg shadow-lg cust-yellow">Create Post</a>
    </div>
    @if(count($posts)>0)
        @foreach ($posts as $post)
        <div class="container flex flex-row p-4 my-2 text-white shadow-md cust-blue">
            <img class="mr-2" width="50" height="0" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->cover_image}}">
            {{-- How to reference to JSON data --}}
            <a href="/posts/{{$post->id}}">
                <h3 class="text-xl">{{$post->title}}</h3>
                <small>
                    Written on {{$post->created_at}}
                     {{-- Retrieves name from the user table using the related post table--}}
                    by {{$post->user->name}}
                </small>
            </a>
        </div>
        @endforeach
        {{-- For pagination links --}}
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection
