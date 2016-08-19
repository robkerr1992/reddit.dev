@extends('layouts.master')

@section('content')
    {{--{{dd($post)}}--}}
    {{--{!! $post !!}--}}
    <dl>
        <dt>Title</dt>
        <dd>{{$post->title}}</dd>
        <dt>URL</dt>
        <dd>{{$post->url}}</dd>
        <dt>Content</dt>
        <dd>{{$post->content}}</dd>
    </dl>

@stop