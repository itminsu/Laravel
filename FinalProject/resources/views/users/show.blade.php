@extends('layouts/app')

@section('content')
    <h1>{{ $user->name }}</h1>
    <h2>Email : {{ $user->email }}</h2>
    <h2>Created by ID: {{ $user->created_by }}</h2>
    <h2>Updated by ID: {{ $user->updated_by }}</h2>
    <h2>Created at: {{ $user->created_at }}</h2>
    <h2>Updated at: {{ $user->updated_at }}</h2>
    @unless ($user->privileges->isEmpty())
        <h2>Privileges:
        @foreach ($user->privileges as $privilege)
                {!! $privilege->description !!}<br>
        @endforeach
        </h2>
    @endunless
    <div class="btn-group">
        <a class="btn btn-primary btn-sm pull-right" href="/user/{{ $user->id }}/edit" role="button">Edit</a>
        {!! Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id]]) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@stop