<!-- Postalcode Field -->
<div class="form-group col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('postalcode', 'Irányítószám:') !!}
        {!! Form::text('postalcode', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10, 'id' => 'postalcode', 'data-inputmask'=>"'mask': '9999'"]) !!}
    </div>

    <!-- Settlement Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('settlement', 'Település:') !!}
        {!! Form::text('settlement', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
    </div>

    <!-- County Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('county', 'Megye:') !!}
        {!! Form::select('county', App\Classes\Settlement\settlementClass::countiesDDDW(), null,
                 ['class'=>'select2 form-control', 'maxlength' => 100, 'id' => 'county']) !!}
    </div>
</div>

{{--<!-- Area Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('area', 'Járás:') !!}--}}
{{--    {!! Form::text('area', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}--}}
{{--</div>--}}

@section('scripts')
    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#postalcode').inputmask();
        });
    </script>
@endsection
