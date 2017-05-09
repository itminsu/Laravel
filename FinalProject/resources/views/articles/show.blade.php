@extends('layouts/app')

@section('content')
    <h1>{{ $article->name }}</h1>
    <h2>Alias: {{ $article->title }}</h2>
    <h2>Description: {{ $article->description }}</h2>
    <h2>Page Order: {{ $article->html_content }}</h2>
    <h2>Page id: {{ $article->page_id }}</h2>
    <h2>Content Area id: {{ $article->content_area_id }}</h2>
    <h2>All page display: {{ $article->is_all_page }}</h2>
    <h2>Created by ID: {{ $article->created_by }}</h2>
    <h2>Updated by ID: {{ $article->updated_by }}</h2>
    <h2>Created at: {{ $article->created_at }}</h2>
    <h2>Updated at: {{ $article->updated_at }}</h2>

    <div class="btn-group">
        <a class="btn btn-primary btn-sm pull-right" href="/article/{{ $article->id }}/edit" role="button">Edit</a>
        {!! Form::open(['method' => 'DELETE', 'action' => ['ArticlesController@destroy', $article->id]]) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@stop