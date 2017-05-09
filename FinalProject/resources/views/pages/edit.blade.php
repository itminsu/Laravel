@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            h1>Edit: {!! $page->name !!}</h1>
            <hr/>

            {!! Form::model($page, ['method' => 'PATCH', 'action' => ['PagesController@update', $page->id]]) !!}

            @include ('pages.form', ['submitBtn' => 'Update Site Page'])

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
