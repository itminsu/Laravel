@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>New Content Area</h1>
            <hr/>
            {!! Form::model($contentArea = new \App\Content, ['url' => 'content']) !!}

            @include ('contentAreas.form', ['submitBtn' => 'Add Content Area'])

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
