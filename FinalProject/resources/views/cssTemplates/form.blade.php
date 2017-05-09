<!-- Name Form -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<!-- Description Form -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<!-- Content Form -->
<div class="form-group">
    {!! Form::label('css_content', 'CSS content:') !!}
    {!! Form::textarea('css_content', null, ['class'=>'form-control']) !!}
</div>

<!-- Active state Form -->
<div class="form-group">
    {!! Form::label('is_active', 'Active state:') !!}
    {!! Form::select('is_active', [false=>'No', true=>'Yes'], null, ['id' => 'is_active', 'class' => 'form-control']) !!}
</div>

<!-- Add Css_template Form -->
<div class="form-group">
    {!! Form::submit($submitBtn, ['class' => 'btn btn-primary form-control']) !!}
    {!! Html::link('/css', 'Cancel', ['class' => 'btn btn-default form-control']) !!}
</div>
