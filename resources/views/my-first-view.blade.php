@extends('layouts.master')

@section('content')
    <h1>Hello, {{ $name }} !</h1>


    @if($name == 'Rob')
    	{{ 'NAH' }}
    @endif
    
@stop