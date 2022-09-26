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

<!-- Postcode Field -->
<div class="col-lg-12">
    <div class="row">
        <div class="form-group col-lg-1">
            {!! Form::label('postcode', 'Irányítószám:') !!}
            {!! Form::select('postcode', settlementClass::postcodeDDDW(), null,
                     ['class'=>'select2 form-control', 'id' => 'postcode']) !!}
        </div>

        <!-- Settlement Field -->
        <div class="form-group col-lg-3">
            {!! Form::label('settlement', 'Település:') !!}
            {!! Form::select('settlement', settlementClass::postcodeSettlementsDDDW(), null,
                     ['class'=>'select2 form-control', 'id' => 'settlement']) !!}
        </div>

        <!-- Address Field -->
        <div class="form-group col-lg-8">
            {!! Form::label('address', 'Cím:') !!}
            {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 250, 'id' => 'address']) !!}
        </div>
    </div>
</div>

<!-- Addresstype Id Field -->
<div class="form-group col-lg-12">
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('addresstypes_id', 'Típus:') !!}
            {!! Form::select('addresstypes_id', App\Http\Controllers\AddresstypesController::DDDW(), null,
                     ['class'=>'select2 form-control', 'id' => 'addresstypes_id']) !!}
        </div>

        <!-- Commit Field -->
        <div class="form-group col-lg-6">
            {!! Form::label('commit', 'Megjegyzés:') !!}
            {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
        </div>
    </div>
</div>

@section('scripts')
    @include('addresses.address_js')
@endsection

