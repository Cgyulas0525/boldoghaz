<!-- Financialinstitutions Id Field -->
<div class="form-group col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('financialinstitutions_id', 'Pénzintézet:') !!}
        {!! Form::select('financialinstitutions_id',
                App\Http\Controllers\FinancialinstitutionsController::DDDW(), null,
                 ['class'=>'select2 form-control cellLabel', 'required' => 'true', 'id' => 'financialinstitutions_id']) !!}
        {!! Form::text('financialinstitutions_text', isset($partnerbankaccounts) ? $partnerbankaccounts->institutName : null, ['class' => 'form-control','maxlength' => 250, 'readonly' => 'true', 'id' => 'fi_text']) !!}
    </div>

    <!-- Accountnumber Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('accountnumber', 'Bankszámlaszám:') !!}
        {!! Form::text('accountnumber', null, ['class' => 'form-control','maxlength' => 26, 'id' => 'accountnumber', 'data-inputmask'=>"'mask': '99999999-99999999-99999999'"]) !!}
    </div>

    <div class="row">
        <div class="col-lg-6">
            {!! Form::label('active', 'Aktív:') !!}
            {!! Form::select('active', utilityClass::yesNoDDDW(), isset($partnerbankaccounts) ? $partnerbankaccounts->activeValue : 1,
                     ['class'=>'select2 form-control', 'id' => 'active']) !!}
            {!! Form::text('active_text', isset($partnerbankaccounts) ? $partnerbankaccounts->activeValue : null,
                ['class' => 'form-control','maxlength' => 250, 'id' => 'active_text', 'readonly' => 'true']) !!}
        </div>
        <div class="form-group col-lg-6">
            {!! Form::label('prime', 'Elsődleges:') !!}
            {!! Form::select('prime', utilityClass::yesNoDDDW(), null,
                     ['class'=>'select2 form-control', 'id' => 'prime']) !!}
            {!! Form::text('prime_text', isset($partnerbankaccounts) ? $partnerbankaccounts->primeValue : null,
                ['class' => 'form-control','maxlength' => 250, 'id' => 'prime_text', 'readonly' => 'true']) !!}
        </div>
    </div>


    <!-- Commit Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('commit', 'Megjegyzés:') !!}
        {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
    </div>
</div>


<!-- Partners Id Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('partners_id', 'Partners Id:') !!}
    {!! Form::hidden('partners_id', isset($parentId) ? $parentId : $partnerbankaccounts->partner_id, ['class' => 'form-control']) !!}
</div>

@section('scripts')
    <script type="text/javascript">

        $('#accountnumber').inputmask();

        function readOnly(tf) {
            $('#financialinstitutions_id').attr('readonly', tf);
            $('#accountnumber').attr('readonly', tf);
            $('#commit').attr('readonly', tf);
        }

        function readOnlyInit() {
            if ($('#active').val() == 0) {
                readOnly(true);
                $('#financialinstitutions_id').hide();
                $('#fi_text').show();
                $('#prime_text').show();
                $('#prime').hide();
            } else {
                readOnly(false);
                $('#financialinstitutions_id').show();
                $('#fi_text').hide();
                $('#prime_text').hide();
                $('#prime').show();
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
