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

<div class="form-group col-lg-12">
    <div class="row">
        <div class="form-group col-lg-6">
            <div class="row">
                <div class="form-group col-lg-6">
                    {!! Form::label('phonenumber', 'Telefonszám:') !!}
                    {!! Form::text('phonenumber', null, ['class' => 'form-control','maxlength' => 100, 'id' => 'phonenumber']) !!}
                </div>

                <div class="form-group col-lg-6">
                    {!! Form::label('phonenumbertypes_id', 'Típus:') !!}
                    {!! Form::select('phonenumbertypes_id', App\Http\Controllers\PhonenumbertypesController::DDDW(), null,
                             ['class'=>'select2 form-control', 'id' => 'phonenumbertypes_id']) !!}
                    {!! Form::text('phonenumbertypes_text', isset($phonenumbers) ? $phonenumbers->phonenumbertypes->name : null,
                        ['class' => 'form-control','maxlength' => 250, 'id' => 'phonenumbertypes_text', 'readonly' => 'true']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    {!! Form::label('active', 'Aktív:') !!}
                    {!! Form::select('active', utilityClass::yesNoDDDW(), null,
                             ['class'=>'select2 form-control', 'id' => 'active']) !!}
                    {!! Form::text('active_text', isset($phonenumbers) ? $phonenumbers->activeValue : null,
                        ['class' => 'form-control','maxlength' => 250, 'id' => 'active_text', 'readonly' => 'true']) !!}
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('prime', 'Elsődleges:') !!}
                    {!! Form::select('prime', utilityClass::yesNoDDDW(), null,
                             ['class'=>'select2 form-control', 'id' => 'prime']) !!}
                    {!! Form::text('prime_text', isset($phonenumbers) ? $phonenumbers->primeValue : null,
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
    <script type="text/javascript">

        function readOnly(tf) {
            $('#phonenumber').attr('readonly', tf);
            $('#commit').attr('readonly', tf);
        }

        function readOnlyInit() {
            if ($('#active').val() == 0) {
                readOnly(true);
                $('#phonenumbertypes_text').show();
                $('#phonenumbertypes_id').hide();
                $('#prime_text').show();
                $('#prime').hide();
            } else {
                readOnly(false);
                $('#phonenumbertypes_text').hide();
                $('#phonenumbertypes_id').show();
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
