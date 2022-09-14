<!-- Financialinstitutions Id Field -->
<div class="form-group col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('financialinstitutions_id', 'Pénzintézet:') !!}
        {!! Form::select('financialinstitutions_id',
                App\Http\Controllers\FinancialinstitutionsController::DDDW(), null,
                 ['class'=>'select2 form-control cellLabel', 'required' => 'true', 'id' => 'financialinstitutions_id']) !!}

    </div>

    <!-- Accountnumber Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('accountnumber', 'Bankszámlaszám:') !!}
        {!! Form::text('accountnumber', null, ['class' => 'form-control','maxlength' => 26, 'id' => 'accountnumber', 'data-inputmask'=>"'mask': '99999999-99999999-99999999'"]) !!}
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
    @include('functions.ajax_js')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            $('#accountnumber').inputmask();

        });
    </script>
@endsection
