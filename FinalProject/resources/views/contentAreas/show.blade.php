@extends('layouts/app')

@section('content')
    <h1>{{ $content->name }}</h1>
    <h2>Alias: {{ $content->alias }}</h2>
    <h2>Description: {{ $content->description }}</h2>
    <h2>Page Order: {{ $content->page_order }}</h2>

    <h2>Created by ID: {{ $content->created_by }}</h2>
    <h2>Updated by ID: {{ $content->updated_by }}</h2>
    <h2>Created at: {{ $content->created_at }}</h2>
    <h2>Updated at: {{ $content->updated_at }}</h2>

    <div class="btn-group">
        <a class="btn btn-primary btn-sm pull-right" href="/content/{{ $content->id }}/edit" role="button">Edit</a>
        {!! Form::open(['method' => 'DELETE', 'action' => ['ContentAreasController@destroy', $content->id]]) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@stop