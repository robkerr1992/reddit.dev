@extends('layouts.master')

@section('content')

    {{--<form style="margin-top: 100px;" method="POST" action="{{ action('PostsController@update', $post->id) }}">--}}
        {{--{{ method_field('PUT') }}--}}
        {{--{{ csrf_field() }}--}}
        {{--Title: <input type="text" name="title" value="{{ $post->title }}">--}}
        {{--@include('partials.errors', ['field' => 'title'])--}}
        {{--URL: <input type="text" name="url" value="{{ $post->url }}">--}}
        {{--@include('partials.errors', ['field' => 'url'])--}}
        {{--Content: <textarea name="content" rows="5" cols="40">{{ $post->content }}</textarea>--}}
        {{--<input type="submit">--}}
    {{--</form>--}}


    <form class="form-horizontal col-md-8 col-md-offset-2" style="margin-top: 150px;" method="post" action="{{ action('PostsController@update', $post->id) }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                Title: <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
            </div>
        </div>
        @include('partials.errors', ['field' => 'title'])
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                URL: <input type="url" class="form-control" name="url" id="url" value="{{ $post->url }}">
            </div>
        </div>
        @include('partials.errors', ['field' => 'url'])
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                Content: <textarea class="form-control" rows="6" name="content" id="content">{{ $post->content }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-default">Edit Post</button>
            </div>
        </div>
    </form>

@stop