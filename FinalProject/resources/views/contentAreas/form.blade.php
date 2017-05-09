<!-- Name Form -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<!-- Alias Form -->
<div class="form-group">
    {!! Form::label('alias', 'Alias:') !!}
    {!! Form::text('alias', null, ['class'=>'form-control']) !!}
</div>

<!-- Display_order Form -->
<div class="form-group">
    {!! Form::label('page_order', 'Page_order:') !!}
    {!! Form::input('number', 'page_order', null, ['class'=>'form-control']) !!}
</div>

<!-- Description Form -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<!-- Add Article Form -->
<div class="form-group">
    {!! Form::submit($submitBtn, ['class' => 'btn btn-primary form-control']) !!}
    {!! Html::link('/content', 'Cancel', ['class' => 'btn btn-default form-control']) !!}
</div>
