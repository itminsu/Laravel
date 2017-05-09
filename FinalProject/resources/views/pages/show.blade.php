@extends('layouts/app')

@section('content')
    <h1>{{ $page->name }}</h1>
    <h2>Alias : {{ $page->alias }}</h2>
    <h2>Description: {{ $page->description }}</h2>
    <h2>Created by ID: {{ $page->created_by }}</h2>
    <h2>Updated by ID: {{ $page->updated_by }}</h2>
    <h2>Created at: {{ $page->created_at }}</h2>
    <h2>Updated at: {{ $page->updated_at }}</h2>

    <div class="btn-group">
        <a class="btn btn-primary btn-sm pull-right" href="/page/{{ $page->id }}/edit" role="button">Edit</a>
        {!! Form::open(['method' => 'DELETE', 'action' => ['PagesController@destroy', $page->id]]) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@stop