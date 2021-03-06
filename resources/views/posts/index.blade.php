@extends('layouts.master')

@section('content')
    <div style="margin-top: 120px;" class="col-lg-3">
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
        Order By:<a href="?orderBy=postScore" data-search="postScore">PostScore</a> <a href="?orderBy=recency"  data-search="recency">Recency</a>
    </div>
    {{--<div class="col-lg-3">--}}

    {{--</div>--}}
    <div class="container-fluid">
        <table class="col-md-12">
            <thead>
            <th class="col-md-2">ID</th>
            <th class="col-md-2">Title</th>
            <th class="col-md-3">Content</th>
            {{--<th class="col-md-3">Content</th>--}}
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="col-md-2">{{$post->user->name}}</td>
                    <td class="col-md-2">{{$post->title}}</td>
                    {{--<td class="col-md-2">{{$post->url}}</td>--}}
                    <td class="col-md-2">{{$post->content}}</td>
                    <td class="col-md-1">
                        <a class="vote" data-vote="1" data-post="{{ $post->id }}" href="#">Up</a>
                        <a class="vote" data-vote="0" data-post="{{ $post->id }}" href="#">Down</a>
                    </td>
                    {{--<td class="col-md-1">{{$post->created_at}}</td>--}}
                    {{--<td class="col-md-2">{{$post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A')}}</td>--}}
                    @if($post->user->id == Auth::id())
                    <td class="col-md-1"><a href="{{action('PostsController@edit', $post->id)}}">Edit</a></td>
                    <td class="col-md-1">
                        <form method="POST" id="post-delete-form" action="{{ action('PostsController@destroy', $post->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" value="Delete Post">
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <form method="POST" id="post-vote" action="{{ action('VoteController@store') }}">
        {{ csrf_field() }}
        <input type="hidden" id="vote" name="vote" value="">
        <input type="hidden" id="post_id" name="post_id" value="">
    </form>


    @if(is_null(Input::get('searchTerm')))
        {!! $posts->render() !!}
    @else
        {!! $posts->appends(['searchTerm' => $_REQUEST['searchTerm']])->render() !!}
    @endif

@stop