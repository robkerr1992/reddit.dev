@extends('layouts.master')

@section('content')

    {{--<form style="margin-top: 100px;" method="POST" action="{{ action('PostsController@store') }}">--}}
        {{--{!! csrf_field() !!}--}}
        Title: <input type="text" name="title" value="{{ old('title') }}">
        {{--@include('partials.errors', ['field' => 'title'])--}}
        {{--URL: <input type="text" name="url" value="{{ old('url') }}">--}}
        {{--@include('partials.errors', ['field' => 'url'])--}}
        {{--Content: <textarea name="content" rows="5" cols="40">{{ old('content') }}</textarea>--}}
        {{--<input type="submit">--}}
    {{--</form>--}}

    {{--@if($errors->has('title'))--}}
        {{--{!! $errors->first('title', '<span class="help-block">:message</span>') !!}--}}

    {{--@endif--}}

    <form class="form-horizontal col-md-8 col-md-offset-2" style="margin-top: 150px;" method="post" action="{{ action('PostsController@store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                Title: <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
        </div>
        @include('partials.errors', ['field' => 'title'])
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                URL: <input type="url" class="form-control" name="url" id="url" value="{{ old('url') }}">
            </div>
        </div>
        @include('partials.errors', ['field' => 'url'])
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                Content: <textarea class="form-control" rows="6" name="content" id="content">{{ old('content') }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-default">Create Post</button>
            </div>
        </div>
    </form>


@stop


