<!-- Contract Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_id', 'Szerződés:') !!}
    {!! Form::text('contract_id', $contract->contractnumber, ['class'=>'form-control', 'id' => 'contract_id', 'readonly' => 'true']) !!}
</div>

<!-- Contractcontenttypes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contractcontenttypes_id', 'Típus:') !!}
    {!! Form::select('contractcontenttypes_id', App\Http\Controllers\ContractcontentController::whereNotInDDDW($contract->id), null,
         ['class'=>'select2 form-control', 'id' => 'contractcontenttypes_id']) !!}
</div>

<!-- Commit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commit', 'Megjegyzés:') !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
</div>
