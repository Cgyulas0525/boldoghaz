<!-- Name Field -->
<div class="form-group col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Név:') !!}
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('protectedrecords', 'Védett rekord:') !!}
        {!! Form::number('protectedrecords', isset($contract) ? $contract->nettom2 : 0, ['class' => 'form-control  text-right', 'id' => 'protectedrecords']) !!}
    </div>

    <!-- Commit Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('commit', 'Megjegyzés:') !!}
        {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
    </div>
</div>
