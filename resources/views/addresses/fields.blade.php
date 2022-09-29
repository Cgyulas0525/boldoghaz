<div class="form-group col-lg-6">
    {!! Form::hidden('table_id', 'Tábla:') !!}
    {!! Form::hidden('table_id', utilityClass::getTableId('partners'), ['class' => 'form-control', 'id' => 'table_id']) !!}
</div>

<div class="form-group col-lg-6">
    {!! Form::hidden('parent_id', 'Parent Id:') !!}
    {!! Form::hidden('parent_id', isset($parentId) ? $parentId : null, ['class' => 'form-control', 'id' => 'parent_id']) !!}
</div>

<div class="col-lg-12">
    <div class="row">
        <div class="form-group col-lg-1">
            {!! Form::label('postcode', 'Irányítószám:') !!}
            {!! Form::select('postcode', settlementClass::postcodeDDDW(), null,
                     ['class'=>'select2 form-control', 'id' => 'postcode']) !!}
            {!! Form::text('postcode_text', isset($address) ? $address->postcode : null, ['class' => 'form-control', 'readonly' => 'true','maxlength' => 250, 'id' => 'postcode_text']) !!}
        </div>
        <div class="form-group col-lg-3">
            {!! Form::label('settlement', 'Település:') !!}
            {!! Form::select('settlement', settlementClass::postcodeSettlementsDDDW(), null,
                     ['class'=>'select2 form-control', 'id' => 'settlement']) !!}
            {!! Form::text('settlement_text', isset($address) ? $address->settlement : null, ['class' => 'form-control','maxlength' => 250, 'readonly' => 'true', 'id' => 'settlement_text']) !!}
        </div>
        <div class="form-group col-lg-8">
            {!! Form::label('address', 'Cím:') !!}
            {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 250, 'id' => 'address']) !!}
        </div>
    </div>
</div>

<div class="form-group col-lg-12">
    <div class="row">
        <div class="form-group col-lg-6">
            <div class="form-group col-lg-12">
                {!! Form::label('addresstypes_id', 'Típus:') !!}
                {!! Form::select('addresstypes_id', App\Http\Controllers\AddresstypesController::DDDW(), null,
                         ['class'=>'select2 form-control', 'id' => 'addresstypes_id']) !!}
                {!! Form::text('addresstypes_text', isset($address) ? $address->addresstypes->name : null,
                    ['class' => 'form-control','maxlength' => 250, 'id' => 'addresstypes_text', 'readonly' => 'true']) !!}
            </div>
            <div class="row">
                <div class="col-lg-6">
                    {!! Form::label('active', 'Aktív:') !!}
                    {!! Form::select('active', App\Classes\Utility\utilityClass::igenNemDDDW(), null,
                             ['class'=>'select2 form-control', 'id' => 'active']) !!}
                    {!! Form::text('active_text', isset($address) ? $address->activeValue : null,
                        ['class' => 'form-control','maxlength' => 250, 'id' => 'active_text', 'readonly' => 'true']) !!}
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('prime', 'Elsődleges:') !!}
                    {!! Form::select('prime', App\Classes\Utility\utilityClass::igenNemDDDW(), null,
                             ['class'=>'select2 form-control', 'id' => 'prime']) !!}
                    {!! Form::text('prime_text', isset($address) ? $address->primeValue : null,
                        ['class' => 'form-control','maxlength' => 250, 'id' => 'prime_text', 'readonly' => 'true']) !!}
                </div>
            </div>
        </div>

        <div class="form-group col-lg-6">
            {!! Form::label('commit', 'Megjegyzés:') !!}
            {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
        </div>
    </div>
</div>

@section('scripts')
    @include('addresses.address_js')

    <script type="text/javascript">

        function readOnly(tf) {
            $('#prime').attr('readonly', tf);
            $('#postcode').attr('readonly', tf);
            $('#settlement').attr('readonly', tf);
            $('#address').attr('readonly', tf);
            $('#addresstypes_id').attr('readonly', tf);
            $('#commit').attr('readonly', tf);
        }

        function readOnlyInit() {
            if ($('#active').val() == 0) {
                readOnly(true);
                $('#addresstypes_text').show();
                $('#addresstypes_id').hide();
                $('#prime_text').show();
                $('#prime').hide();
                $('#settlement_text').show();
                $('#settlement').hide();
                $('#postcode_text').show();
                $('#postcode').hide();
            } else {
                readOnly(false);
                $('#addresstypes_text').hide();
                $('#addresstypes_id').show();
                $('#prime_text').hide();
                $('#prime').show();
                $('#settlement_text').hide();
                $('#settlement').show();
                $('#postcode_text').hide();
                $('#postcode').show();
            }
        }

        function primeInit() {
            if ($('#prime').val() == 0) {
                $('#active_text').hide();
                $('#active').show();
            } else {
                $('#active_text').show();
                $('#active').hide();
            }
        }

        readOnlyInit();
        primeInit();

        $('#active').change(function () {
            readOnlyInit();
        });

        $('#prime').change(function () {
            if ($('#prime').val() == 1) {
                $('#active').val(1);
                $('#active_text').val('Igen');
            }
            primeInit();
        });

    </script>
@endsection

