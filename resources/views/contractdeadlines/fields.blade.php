@include('formGroup.formGroup', ["label" => Form::label('contract', 'Szerződés:'),
                                 "field" => Form::text('contract', isset($contract) ? $contract->contractnumber : $contractdeadline->contract->contractnumber,
                                                        ['class'=>'form-control', 'id' => 'contract', 'readonly' => 'true'])])

@include('formGroup.formGroup', ["label" => Form::label('constructionphase_id', 'Kivitelezési fázis:'),
                                 "field" => Form::select('constructionphase_id', App\Http\Controllers\ConstructionphaseController::notInDDDW(isset($contract) ? $contract->id : $contractdeadline->contract_id), null,
                                                        ['class'=>'select2 form-control', 'required' => 'true', 'id' => 'constructionphase_id'])])

@include('formGroup.formGroup', ["label" => Form::label('deadline', 'Határidő:'),
                                 "field" => Form::date('deadline', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'true', 'id'=>'deadline'])])

@include('formGroup.formGroup', ["label" => Form::label('performance', 'Teljesítés:'),
                                 "field" => Form::date('performance', null, ['class' => 'form-control', 'id'=>'performance'])])

@include('formGroup.formGroup', ["label" => Form::label('commit', 'Megjegyzés:'),
                                 "field" => Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit'])])

@include('formGroup.formGroup', ["label" => Form::hidden('contract_id', 'Szerződés:'),
                                 "field" => Form::hidden('contract_id', isset($contract) ? $contract->id : $contractdeadline->contract_id, ['class'=>'form-control', 'id' => 'contract_id', 'readonly' => 'true'])])

@include('formGroup.formGroup', ["label" => Form::hidden('contractDeadline', 'Szerződés:'),
                                 "field" => Form::hidden('contractDeadline', isset($contract) ? $contract->deadline : $contractdeadline->contract->deadline, ['class'=>'form-control', 'id' => 'contractDeadline', 'readonly' => 'true'])])

@section('scripts')
    <script type="text/javascript">
        $(function () {

            $('#deadline').change(function () {
                var deadline = $('#deadline').val();
                var contractDeadline = $('#contractDeadline').val();
                if ( deadline > contractDeadline ) {
                    alert('Nem lehet késöbb mint a szerződés határideje!');
                    $('#deadline').focus();
                } else {
                    alert('OK');
                }
            });

        });
    </script>
@endsection

