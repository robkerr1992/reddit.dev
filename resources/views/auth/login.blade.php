@extends('layouts.master')

@section('content')

    <form style="margin-top: 100px;" method="post" action="{{action('Auth\AuthController@postLogin')}}">
        {{ csrf_field() }}
        <label>Email</label>
        <input type="email" name="email" id="email">
        @include('partials.errors', ['field' => 'email'])
        <label>Password</label>
        <input type="password" name="password" id="password">
        @include('partials.errors', ['field' => 'password'])
        <button type="sumbit">Login</button>
    </form>
@stop