@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Content Areas</h1>
            <hr/>
            <ul class="list-group">
                @foreach($contents as $content)
                    <li class="list-group-item">
                        <h2><a href="{{ action('ContentAreasController@show', [$content->id]) }}">{{ $content->name }}</a></h2>
                        <div>
                            {{ $content->description }}
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="content/create" class="btn btn-primary">Add Content Area</a>
        </div>
    </div>
@stop
