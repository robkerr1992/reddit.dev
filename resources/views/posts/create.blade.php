@extends('layouts.master')

@section('content')

    <form style="margin-top: 100px;" method="POST" action="{{ action('PostsController@store') }}">
        {!! csrf_field() !!}
        Title: <input type="text" name="title" value="{{ old('title') }}">
        @include('partials.errors', ['field' => 'title'])
        URL: <input type="text" name="url" value="{{ old('url') }}">
        @include('partials.errors', ['field' => 'url'])
        Content: <textarea name="content" rows="5" cols="40">{{ old('content') }}</textarea>
        <input type="submit">
    </form>

    {{--@if($errors->has('title'))--}}
        {{--{!! $errors->first('title', '<span class="help-block">:message</span>') !!}--}}

    {{--@endif--}}



@stop


