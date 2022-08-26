@if (isset($ececitems))
<!-- Energyclassifications Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::hidden('energyclassifications_id', 'Energyclassifications Id:') !!}
        {!! Form::hidden('energyclassifications_id', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Ecitems Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::hidden('ecitems_id', 'Ecitems Id:') !!}
        {!! Form::hidden('ecitems_id', null, ['class' => 'form-control', 'id' => 'ecitems_id']) !!}
    </div>

    <!-- Heatingtypes Id Field -->
    @if ($ececitems->ecitems_id == 1)
        <div class="form-group col-sm-6">
            {!! Form::label('heatingtypes_id', 'Fűtés típus:', ['id' => 'heatingtypes_idlabel']) !!}
            {!! Form::select('heatingtypes_id', App\Http\Controllers\HeatingtypesController::DDDW(),
                             isset($ececitems) ? $ececitems->heatingtypes_id : NULL,
                             ['class'=>'select2 form-control cellLabel', 'required' => 'true', 'id' => 'heatingtypes_id']) !!}
        </div>
    @endif
    @if ($ececitems->ecitems_id == 3 || $ececitems->ecitems_id)
        <!-- Quantity Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('quantity_id', 'Mennyiségi egység:', ['id' => 'quantity_idlabel']) !!}
            {!! Form::select('quantity_id', App\Http\Controllers\QuantityController::DDDW(),
                             isset($ececitems) ? $ececitems->heatingtypes_id : NULL,
                             ['class'=>'select2 form-control cellLabel', 'required' => 'true', 'id' => 'quantity_id']) !!}
        </div>

        <!-- Quantity Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('piece', 'Mennyiség:', ['id' => 'piecelabel']) !!}
            {!! Form::number('piece', null, ['class' => 'form-control', 'required' => 'true']) !!}
        </div>
    @endif
@else
    <div class="form-group col-sm-6">
        {!! Form::label('energyclassifications_id', 'Energetikai besorolás:') !!}
        {!! Form::text('energyclassifications_id', $ec->name, ['class'=>'form-control', 'readonly' => 'true', 'id' => 'energyclassifications_id']) !!}
    </div>

    <!-- Ecitems Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('ecitems_id', 'Energetikai besorolás elem:') !!}
        {!! Form::select('ecitems_id', App\Http\Controllers\EcitemsController::DDDW($ec->id), null,
                         ['class'=>'select2 form-control cellLabel', 'required' => 'true', 'id' => 'ecitems_id']) !!}
    </div>

    <!-- Quantity Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('quantity_id', 'Mennyiségi egység:', ['id' => 'quantity_idlabel']) !!}
        {!! Form::select('quantity_id', App\Http\Controllers\QuantityController::DDDW(), null,
                         ['class'=>'select2 form-control cellLabel', 'required' => 'true', 'id' => 'quantity_id']) !!}
    </div>

    <!-- Quantity Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('piece', 'Mennyiség:', ['id' => 'piecelabel']) !!}
        {!! Form::number('piece', null, ['class' => 'form-control', 'required' => 'true', 'id' => 'piece']) !!}
    </div>
    <!-- Heatingtypes Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('heatingtypes_id', 'Fűtés típus:', ['id' => 'heatingtypes_idlabel']) !!}
        {!! Form::select('heatingtypes_id', App\Http\Controllers\HeatingtypesController::DDDW(), null,
                         ['class'=>'select2 form-control cellLabel', 'required' => 'true', 'id' => 'heatingtypes_id']) !!}
    </div>
@endif

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function fieldHide() {
                $('#heatingtypes_id').hide();
                $('#quantity_id').hide();
                $('#piece').hide();
                $('#heatingtypes_idlabel').hide();
                $('#quantity_idlabel').hide();
                $('#piecelabel').hide();

                $('#heatingtypes_id').removeAttr("required");
                $('#quantity_id').removeAttr("required");
                $('#piece').removeAttr("required");
                $('#heatingtypes_id').val(null);
                $('#quantity_id').val(null);
                $('#piece').val(null);
            }

            function heatingField() {
                $('#heatingtypes_id').show();
                $('#quantity_id').hide();
                $('#piece').hide();
                $('#heatingtypes_idlabel').show();
                $('#quantity_idlabel').hide();
                $('#piecelabel').hide();

                $('#heatingtypes_id').attr("required", "true");
                $('#quantity_id').removeAttr("required");
                $('#piece').removeAttr("required");
                $('#quantity_id').val(null);
                $('#piece').val(null);
            }

            function quantityField() {
                $('#heatingtypes_id').hide();
                $('#quantity_id').show();
                $('#piece').show();
                $('#heatingtypes_idlabel').hide();
                $('#quantity_idlabel').show();
                $('#piecelabel').show();

                $('#heatingtypes_id').removeAttr("required");
                $('#heatingtypes_id').val(null);
                $('#quantity_id').attr("required", "true");
                $('#piece').attr("required", "true");
            }

            function fieldChange(id) {
                if ( id == 1) {
                    heatingField();
                } else if ( id == 3 || id == 8 ) {
                    quantityField();
                } else {
                    fieldHide();
                }
            }

            $('#ecitems_id').change(function() {
                fieldChange($('#ecitems_id').val());
            });

            fieldChange($('#ecitems_id').val());
        });
    </script>
@endsection
