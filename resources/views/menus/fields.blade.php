<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    {!! Form::number('parent_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Icon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icon', 'Icon:') !!}
    {!! Form::text('icon', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Route Field -->
<div class="form-group col-sm-6">
    {!! Form::label('route', 'Route:') !!}
    {!! Form::text('route', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Request Field -->
<div class="form-group col-sm-6">
    {!! Form::label('request', 'Request:') !!}
    {!! Form::text('request', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Parenticon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parenticon', 'Parenticon:') !!}
    {!! Form::number('parenticon', null, ['class' => 'form-control']) !!}
</div>

<!-- Userstatus Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userstatus_id', 'Userstatus Id:') !!}
    {!! Form::number('userstatus_id', null, ['class' => 'form-control']) !!}
</div>