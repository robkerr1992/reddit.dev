@extends('layouts.master')

@section('content')
    {{--{{dd($posts)}}--}}
    <div style="margin-top: 150px;" class="container-fluid">
        <table class="col-md-12">
            <thead>
            <th class="col-md-1">ID</th>
            <th class="col-md-2">Title</th>
            <th class="col-md-3">URL</th>
            <th class="col-md-3">Content</th>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="col-md-1">{{$post->created_by}}</td>
                    <td class="col-md-2">{{$post->title}}</td>
                    <td class="col-md-3">{{$post->url}}</td>
                    <td class="col-md-3">{{$post->content}}</td>
                    <td class="col-md-2">{{$post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A')}}</td>
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

    <div class="col-md-offset-3 col-md-6">
        {!! $posts->render() !!}
    </div>


@stop