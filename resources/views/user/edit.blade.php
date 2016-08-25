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


    <form class="form-horizontal col-md-8 col-md-offset-2" style="margin-top: 150px;" method="post" action="{{ action('UserController@update', $user->id) }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                Name: <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div>
        </div>
        @include('partials.errors', ['field' => 'name'])
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                Email: <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
            </div>
        </div>
        @include('partials.errors', ['field' => 'email'])
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                New Password: <input type="password" class="form-control" name="password" id="password"></input>
                Confirm Password: <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"></input>
            </div>
        </div>
        @include('partials.errors', ['field' => 'password'])
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-default">Edit User</button>
            </div>
        </div>
    </form>

@stop