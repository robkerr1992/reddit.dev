@extends('layouts.master')

@section('content')
    <div style="margin-top: 150px;" class="col-lg-3">
        <form method="get" action="{{ action('PostsController@index') }}">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="searchTerm" id ="searchTerm">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Search
                    <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>
    <div class="container-fluid">
        <table class="col-md-12">
            <thead>
            <th class="col-md-2">ID</th>
            <th class="col-md-2">Title</th>
            <th class="col-md-3">URL</th>
            <th class="col-md-3">Content</th>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="col-md-2">{{$post->user->name}}</td>
                    <td class="col-md-2">{{$post->title}}</td>
                    <td class="col-md-2">{{$post->url}}</td>
                    <td class="col-md-2">{{$post->content}}</td>
                    <td class="col-md-1">{{$post->created_at}}</td>
                    <td class="col-md-1"><a href="{{action('PostsController@edit', $post->id)}}">Edit</a></td>
                    {{--<td class="col-md-2">{{$post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A')}}</td>--}}
                    <td class="col-md-1">
                        <form method="POST" id="post-delete-form" action="{{ action('PostsController@destroy', $post->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" value="Delete Post">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- add hidden to form and remove button somehow--}}
    {{--{{ method_field('DELETE') }}--}}

    {{--<div class="col-md-8">--}}
    @if(is_null(Input::get('searchTerm')))
        {!! $posts->render() !!}
    {{--</div>--}}
    @else
        {!! $posts->appends(['searchTerm' => $_REQUEST['searchTerm']])->render() !!}
    @endif

@stop