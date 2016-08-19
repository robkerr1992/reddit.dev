@extends('layouts.master')

@section('content')
    {{--{{dd($posts)}}--}}
    <table>
        <thead>
        <th>Title</th>
        <th>URL</th>
        <th>Content</th>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->url}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A')}}</td>
                <td>
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


    {{-- add hidden to form and remove button somehow--}}
    {{--{{ method_field('DELETE') }}--}}


    {!! $posts->render() !!}
@stop