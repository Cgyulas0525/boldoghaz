<!-- Table Id Field -->
<div class="form-group col-lg-6">
    {!! Form::hidden('table_id', 'Tábla:') !!}
    {!! Form::hidden('table_id', utilityClass::getTableId('partners'), ['class' => 'form-control', 'id' => 'table_id']) !!}
</div>

<!-- Parent Id Field -->
<div class="form-group col-lg-6">
    {!! Form::hidden('parent_id', 'Parent Id:') !!}
    {!! Form::hidden('parent_id', isset($parentId) ? $parentId : null, ['class' => 'form-control', 'id' => 'parent_id']) !!}
</div>

<!-- Phonenumber Field -->
<div class="form-group col-sm-2">
    {!! Form::label('phonenumber', 'Telefonszám:') !!}
    {!! Form::text('phonenumber', null, ['class' => 'form-control','maxlength' => 100, 'id' => 'phonenumber']) !!}
</div>

<!-- Phonenumbertypes Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('phonenumbertypes_id', 'Típus:') !!}
    {!! Form::select('phonenumbertypes_id', App\Http\Controllers\PhonenumbertypesController::DDDW(), null,
             ['class'=>'select2 form-control', 'id' => 'phonenumbertypes_id']) !!}
</div>

<!-- Commit Field -->
<div class="form-group col-sm-7">
    {!! Form::label('commit', 'Megjegyzés:') !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
</div>
