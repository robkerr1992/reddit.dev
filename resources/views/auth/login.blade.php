@extends('layouts.master')

@section('content')

    {{--<form style="margin-top: 100px;" method="post" action="{{action('Auth\AuthController@postLogin')}}">--}}
        {{--{{ csrf_field() }}--}}
        {{--<label>Email</label>--}}
        {{--<input type="email" name="email" id="email">--}}
        {{--@include('partials.errors', ['field' => 'email'])--}}
        {{--<label>Password</label>--}}
        {{--<input type="password" name="password" id="password">--}}
        {{--@include('partials.errors', ['field' => 'password'])--}}
        {{--<button type="sumbit">Login</button>--}}
    {{--</form>--}}



    <form class="form-horizontal col-md-8 col-md-offset-2" style="margin-top: 150px;" method="post" action="{{action('Auth\AuthController@postLogin')}}">
        {{ csrf_field() }}
        <div class="form-group">
            {{--<label for="inputEmail3" class="col-sm-offset-1 col-sm-1 control-label">Email</label>--}}
            <div class="col-sm-10 col-sm-offset-1">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            {{--<label for="inputPassword3" class="col-sm-offset-1 col-sm-1 control-label">Password</label>--}}
            <div class="col-sm-10 col-sm-offset-1">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-5 col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember?
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
            </div>
        </div>
        @include('partials.errors', ['field' => 'email'])
        @include('partials.errors', ['field' => 'password'])
    </form>
@stop