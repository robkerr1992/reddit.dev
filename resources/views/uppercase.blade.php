@extends('layouts.master')

@section('content')
	<h1>You entered: {{$word}}</h1>
	<h1>Uppercase: {{$upper}}</h1>


	<p>
		<a href="{{ action('HomeController@increment', ['number' => 10]) }}">Increase Number</a>
	</p>
@stop