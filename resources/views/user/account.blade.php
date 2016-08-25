@extends('layouts.master')

@section('content')

    <h1 style="margin-top: 120px;">{{$user->name}}'s PostScore:{{$user->voteScore()}}</h1>
    <div class="container-fluid">
        <table class="col-md-12">
            <thead>
            <th class="col-md-2">Name</th>
            <th class="col-md-2">ID</th>
            <th class="col-md-2">Email</th>
            <th class="col-md-2">Created</th>
            </thead>
            <tbody>
                <tr>
                    <td class="col-md-2">{{$user->name}}</td>
                    <td class="col-md-2">{{$user->id}}</td>
                    <td class="col-md-2">{{$user->email}}</td>
                    <td class="col-md-2">{{$user->created_at}}</td>
                    <td class="col-md-1"><a href="/user/posts/{{$user->id}}">Posts</a></td>
                    <td class="col-md-1"><a href="/user/{{$user->id}}/edit">Edit Account</a></td>
                </tr>
            </tbody>
        </table>
    </div>

@stop