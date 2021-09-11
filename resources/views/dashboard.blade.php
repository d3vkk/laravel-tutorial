@extends('layouts.app')

@section('content')
<div>
    @if (session('status'))
        <div class="w-full p-4 my-2 text-green-500 bg-green-200 rounded-lg">
            {{session('status')}}
        </div>
    @endif
    <span class="mr-4 text-2xl bold">Dashboard</span>
    <a href="/posts/create" target="_self" class="p-2 m-2 rounded-lg shadow-lg cust-yellow">Create Post</a>
    @if(count($posts) > 0)
    <table class="mt-4">
        <thead>
            <tr class="uppercase">
                <th class="p-1 border-2 border-black">Title</th>
                <th class="p-1 border-2 border-black"></th>
                <th class="p-1 border-2 border-black"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td class="p-2 border-2 border-black">{{$post->title}}</td>
                <td class="p-2 border-2 border-black">
                   <a href="/posts/{{$post->id}}/edit" class="float-right p-2 mt-4 text-black rounded-lg shadow-lg cust-yellow">Edit</a>
                </td>
                <td class="p-2 border-2 border-black">
                    {!! Form::open(['action'=>['PostController@destroy', $post->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::submit('Delete', ['class'=>'p-2 mt-4 cust-red shadow-lg rounded-lg']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div>No Posts Found</div>
    @endif
</div>
@endsection
