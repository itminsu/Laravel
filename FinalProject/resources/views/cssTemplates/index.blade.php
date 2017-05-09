@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>CSS Templates</h1>
            <hr/>
            <ul class="list-group">
                @foreach($templates as $template)
                    <li class="list-group-item">
                        <h2><a href="{{ action('CssTemplatesController@show', [$template->id]) }}">{{ $template->name }}</a></h2>
                        <div>
                            {{ $template->description }}
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="css/create" class="btn btn-primary">Add Css Template</a>
        </div>
    </div>
@stop
