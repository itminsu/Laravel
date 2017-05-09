@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Pages</h1>
            <hr/>
            <ul class="list-group">
                @foreach($pages as $page)
                    <li class="list-group-item">
                        <h2><a href="{{ action('PagesController@show', [$page->id]) }}">{{ $page->name }}</a></h2>
                        <div>
                            {{ $page->alias }}
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="page/create" class="btn btn-primary">Add Page</a>
        </div>
    </div>
@stop
