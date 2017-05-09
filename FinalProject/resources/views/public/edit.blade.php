@extends('layouts/app')

@section('content')
    <h1>Edit: {!! $article->title !!}</h1>
    <hr/>

    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['PublicController@update', $article->id]]) !!}

    @include ('public.form', ['submitBtn' => 'Update Article'])

    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@stop