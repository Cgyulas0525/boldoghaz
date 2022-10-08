<div class="form-group col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Típus:') !!}
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100]) !!}
    </div>
    <!-- Types Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('types', 'Szerződés:') !!}
        {!! Form::select('types', utilityClass::witchContractDDDW(), null,
         ['class'=>'select2 form-control', 'id' => 'types']) !!}
    </div>
    <!-- Commit Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('commit', 'Megjegyzés:') !!}
        {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
    </div>
</div>
