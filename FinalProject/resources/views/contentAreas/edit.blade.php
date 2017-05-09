@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1>Edit: {!! $content->name !!}</h1>
        <hr/>

        {!! Form::model($content, ['method' => 'PATCH', 'action' => ['ContentAreasController@update', $content->id]]) !!}

        @include ('contentAreas.form', ['submitBtn' => 'Update Content Area'])

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
