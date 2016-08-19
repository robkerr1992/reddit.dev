@extends('layouts.master')

@section('content')

    <form method="POST" action="{{ action('PostsController@update', $post->id) }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        Title: <input type="text" name="title" value="{{ $post->title }}">
        @include('partials.errors', ['field' => 'title'])
        URL: <input type="text" name="url" value="{{ $post->url }}">
        @include('partials.errors', ['field' => 'url'])
        Content: <textarea name="content" rows="5" cols="40">{{ $post->content }}</textarea>
        <input type="submit">
    </form>

@stop