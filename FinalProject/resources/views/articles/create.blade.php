@extends('layouts/app')

@section('content')

    <script type="text/javascript" src="{{ asset('/resources/views/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector : "textarea",
            plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    </script>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>New Article</h1>
            <hr/>
            {!! Form::model($article = new \App\Article, ['url' => 'article']) !!}

            @include ('articles.form', ['submitBtn' => 'Add Article'])

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
