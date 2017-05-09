@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>New User</h1>
            <hr/>
            {!! Form::model($user = new \App\User, ['url' => 'user']) !!}

            @include ('users.form', ['submitBtn' => 'Add User'])

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

