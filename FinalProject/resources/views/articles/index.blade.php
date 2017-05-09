@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Articles</h1>
            <hr/>
            <ul class="list-group">
                @foreach($articles as $article)
                    <li class="list-group-item">
                        <h2><a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->name }}</a></h2>
                        <div>
                            {{ $article->title }}
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="article/create" class="btn btn-primary">Add Article</a>
        </div>
    </div>
@stop
