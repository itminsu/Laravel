@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Edit: {!! $template->title !!}</h1>
            <hr/>

            {!! Form::model($template, ['method' => 'PATCH', 'action' => ['CssTemplatesController@update', $template->id]]) !!}

            @include ('cssTemplates.form', ['submitBtn' => 'Update CSS Template'])

            {!! Form::close() !!}

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@stop
