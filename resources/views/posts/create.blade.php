@extends('layouts.app')
@section('content')
    <h1 class="mb-6 text-2xl bold">Create Post</h1>
    {!! Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
        <div>
            {!! Form::label('title', 'Title') !!}
            <br>
            {!! Form::text('title', '', ['class'=>'bg-gray-200 shadow w-full p-2 mt-2 mb-6', 'placeholder'=>'Title']) !!}
        </div>
        <div>
            {!! Form::label('body', 'Body') !!}
            <br>
            {!! Form::textarea('body', '', ['class'=>'bg-gray-200 shadow w-full p-2 mt-2 mb-6', 'placeholder'=>'Body Text']) !!}
        </div>
        <div>
            {!! Form::file('cover_image', ['class'=>'p-2 mt-2 mb-6']) !!}
        </div>
        {!! Form::submit('Submit', ['class'=>'p-2 m-2 cust-yellow shadow-lg rounded-lg']) !!}
    {!! Form::close() !!}

@endsection
