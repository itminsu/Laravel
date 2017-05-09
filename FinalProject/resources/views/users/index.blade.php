@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Users</h1>
            <hr/>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">
                        <h2><a href="{{ action('UsersController@show', [$user->id]) }}">{{ $user->name }}</a></h2>
                        <div>
                            @unless ($user->privileges->isEmpty())
                                @foreach ($user->privileges as $privilege)
                                    {!! $privilege->description !!}<br>
                                @endforeach
                            @endunless
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="user/create" class="btn btn-primary">Add User</a>
        </div>
    </div>
@stop
