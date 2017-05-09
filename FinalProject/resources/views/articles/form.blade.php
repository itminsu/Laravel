<script type="text/javascript" src="{{ config('tinymce.cdn') }}"></script>
<script type="text/javascript">
    @if(isset($els))
        @foreach($els as $el)
            tinymce.init(
            {!! json_encode(config('tinymce.'.$el)) !!}
    );
    @endforeach
@else
    tinymce.init(
            {!! json_encode(config('tinymce.default')) !!}
    );
    @endif

</script>

<!-- Name Form -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<!-- Title Form -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<!-- Description Form -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<!-- Html Content Form -->
<div class="form-group">
    {!! Form::label('html_content', 'HTML Content:') !!}
    {!! Form::textarea('html_content', null, ['class'=>'form-control']) !!}
</div>

<!-- Activate From -->
<div class="form-group">
    {!! Form::label('is_removed', 'Disabled:') !!}
    {!! Form::select('is_removed', [false=>'No', true=>'Yes'], null, ['id' => 'is_removed', 'class' => 'form-control']) !!}
</div>

<!-- Published_at Form -->
<div class="form-group">
    {!! Form::label('published_at', 'Published_at:') !!}
    {!! Form::input('date', 'published_at', $article->published_at, ['class'=>'form-control']) !!}
</div>

<!-- Active All_page -->
<div class="form-group">
    {!! Form::label('is_all_page', 'All Pages:') !!}
    {!! Form::select('is_all_page', [false=>'No', true=>'Yes'], null, ['id' => 'is_all_page', 'class' => 'form-control']) !!}
</div>

<!-- Page Form -->
<div class="form-group">
    {!! Form::label('page_id', 'Site Page:') !!}
    {!! Form::select('page_id', $pages, null, ['class'=>'form-control']) !!}
</div>

<!-- Content Area Form -->
<div class="form-group">
    {!! Form::label('content_area_id', 'Content Area:') !!}
    {!! Form::select('content_area_id', $contents, null, ['class'=>'form-control']) !!}
</div>
<!-- Add Article Form -->
<div class="form-group">
    {!! Form::submit($submitBtn, ['class' => 'btn btn-primary form-control']) !!}
    {!! Html::link('/article', 'Cancel', ['class' => 'btn btn-default form-control']) !!}
</div>
