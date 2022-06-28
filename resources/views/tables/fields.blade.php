<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Név:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Commit Field -->
<div class="row col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::label('commit', 'Megjegyzés:') !!}
        {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
    </div>
</div>
