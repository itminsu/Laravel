@extends('layouts/app')

@section('content')
    <h1>New Article</h1>
    <hr/>

    {!! Form::model($article = new \App\Article, ['url' => 'public']) !!}

    @include ('public.form', ['submitBtn' => 'Add Article'])

    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@stop