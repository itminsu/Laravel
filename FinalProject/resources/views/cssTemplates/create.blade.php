@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>New CSS Template</h1>
            <hr/>
            {!! Form::model($cssTemplate = new \App\Template, ['url' => 'css']) !!}

            @include ('cssTemplates.form', ['submitBtn' => 'Add CSS Template'])

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

