<!-- Name Form -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<!-- Email Form -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
</div>

<!-- Password Form -->
<div class="form-group">
    {!! Form::label('password', 'Password: (Re-type password for security)') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
</div>

<!-- Privilege Form -->
<div class="form-group">
    {!! Form::label('privilege_list', 'Privileges:') !!}
    {!! Form::select('privilege_list[]', $privileges, null, ['id' => 'privilege_list', 'class' => 'form-control', 'multiple' => 'true']) !!}
</div>

<!-- Add user Form -->
<div class="form-group">
    {!! Form::submit($submitBtn, ['class' => 'btn btn-primary form-control']) !!}
    {!! Html::link('/user', 'Cancel', ['class' => 'btn btn-default form-control']) !!}
</div>



