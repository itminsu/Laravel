@extends('layouts/app')

@section('content')
    <h1>{{ $template->name }}</h1>
    <h2>Description: {{ $template->description }}</h2>
    <h2>CSS Content: {{ $template->css_content }}</h2>
    <h2>is_active: {{ $template->is_active }}</h2>

    <h2>Created by ID: {{ $template->created_by }}</h2>
    <h2>Updated by ID: {{ $template->updated_by }}</h2>
    <h2>Created at: {{ $template->created_at }}</h2>
    <h2>Updated at: {{ $template->updated_at }}</h2>

    <div class="btn-group">
        <a class="btn btn-primary btn-sm pull-right" href="/css/{{ $template->id }}/edit" role="button">Edit</a>
        {!! Form::open(['method' => 'DELETE', 'action' => ['CssTemplatesController@destroy', $template->id]]) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@stop