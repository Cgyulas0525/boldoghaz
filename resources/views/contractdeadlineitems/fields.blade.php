@include('formGroup.formGroup', ["label" => Form::label('contract', 'Szerződés:'),
                                 "field" => Form::text('contract', isset($contractdeadlineitem) ? $contractdeadlineitem->contractdeadline->contract->contractnumber : $contractdeadline->contract->contractnumber,
                                                        ['class'=>'form-control', 'id' => 'contract', 'readonly' => 'true'])])

@include('formGroup.formGroup', ["label" => Form::label('constructionphase_id', 'Kivitelezési fázis:'),
                                 "field" => Form::text('constructionphase_id', isset($contractdeadlineitem) ? $contractdeadlineitem->contractdeadline->constructionphase->name : $contractdeadline->constructionphase->name,
                                                        ['class'=>'form-control', 'id' => 'contract', 'readonly' => 'true'])])

{!! Form::hidden('contractdeadline_id', isset($contractdeadlineitem) ? $contractdeadlineitem->contractdeadline->id : $contractdeadline->id, ['class' => 'form-control']) !!}

@include('formGroup.formGroup', ["label" => Form::label('deadline', 'Határidő:'),
                                 "field" => Form::date('deadline', isset($contractdeadlineitem) ? $contractdeadlineitem->deadline : \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'true', 'id'=>'deadline'])])

@include('formGroup.formGroup', ["label" => Form::label('performance', 'Teljesítés:'),
                                 "field" => Form::date('performance', isset($contractdeadlineitem) ? $contractdeadlineitem->performance : null, ['class' => 'form-control', 'id'=>'performance'])])

@include('formGroup.formGroup', ["label" => Form::label('commit', 'Megjegyzés:'),
                                 "field" => Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit'])])

@include('formGroup.formGroup', ["label" => Form::hidden('contractDeadline', 'Szerződés:'),
                                 "field" => Form::hidden('contractDeadline', isset($contractdeadlineitem) ? $contractdeadlineitem->contractdeadline->contract->deadline : $contractdeadline->contract->deadline, ['class'=>'form-control', 'id' => 'contractDeadline', 'readonly' => 'true'])])

@include('formGroup.formGroup', ["label" => Form::hidden('contractDeadlineDeadline', 'Szerződés:'),
                                 "field" => Form::hidden('contractDeadlineDeadline', isset($contractdeadlineitem) ? $contractdeadlineitem->contractdeadline->deadline : $contractdeadline->deadline, ['class'=>'form-control', 'id' => 'contractDeadlineDeadline', 'readonly' => 'true'])])

@include('formGroup.formGroup', ["label" => Form::hidden('contractDeadlineDeadline', 'Szerződés:'),
                                 "field" => Form::hidden('contractdate', isset($contractdeadlineitem) ? $contractdeadlineitem->contractdeadline->contract->contractdate : $contractdeadline->contract->contractdate, ['class'=>'form-control', 'id' => 'contractdate', 'readonly' => 'true'])])


@section('scripts')

    @include('functions.sweetalert_js')

    <script type="text/javascript">
        $(function () {

            $('#deadline').change(function () {
                var deadline = $('#deadline').val();
                var contractDeadline = $('#contractDeadline').val();
                var contractDeadlineDeadline = $('#contractDeadlineDeadline').val();
                if ( deadline > contractDeadline ) {
                    sw('Nem lehet késöbb mint a szerződés határideje!');
                    $('#deadline').focus();
                } else {
                    if (daedline > contractDeadlineDeadline) {
                        sw('Nem lehet késöbb mint a szerződés elem határideje!');
                        $('#deadline').focus();
                    }
                }
            });

            $('#performance').change(function () {
                var performance = $('#performance').val();
                var contractdate = $('#contractdate').val();
                if ( performance < contractdate ) {
                    sw('A teljesítés nem lehet hamarabb, mint a szerződés dátuma!');
                    $('#performance').focus();
                }
            })

        });
    </script>
@endsection
