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


    <form class="form-horizontal col-md-8 col-md-offset-2" style="margin-top: 150px;" method="post" action="{{action('Auth\AuthController@postRegister')}}">
        {{--{{ method_field('PUT') }}--}}
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                Name: <input type="text" class="form-control" name="name" id="name" value="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                Email: <input type="email" class="form-control" name="email" id="email" value="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                Password: <input type="password" class="form-control" name="password" id="password">
                Confirm Password: <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-default">Register</button>
            </div>
        </div>
        @include('partials.errors', ['field' => 'name'])
        @include('partials.errors', ['field' => 'email'])
        @include('partials.errors', ['field' => 'password'])
    </form>

@stop