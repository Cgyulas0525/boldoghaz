<!-- Valuelimit Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('equipmenttypes_id', 'Equipmenttypes_id Id:') !!}
    {!! Form::hidden('equipmenttypes_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ecitems Id Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('eqitems_id', 'Eqitems Id:') !!}
    {!! Form::hidden('eqitems_id', null, ['class' => 'form-control', 'id' => 'eqitems_id']) !!}
</div>

<!-- Commit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commit', 'Megjegyzés:') !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('valuelimit', 'Értékhatár:', ['id' => 'valuelimitlabel']) !!}
    {!! Form::number('valuelimit', null, ['class' => 'form-control', 'id' => 'valuelimit']) !!}
</div>


@section('scripts')
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function fieldHide() {
                $('#valuelimit').hide();
                $('#valuelimitlabel').hide();

                $('#valuelimit').removeAttr("required");
                $('#valuelimit').val(null);
            }

            function fieldShow() {
                $('#valuelimit').show();
                $('#valuelimitlabel').show();

                $('#valuelimit').attr("required", "true");
            }

            function fieldChange(id) {
                if ( id > 3 && id < 9) {
                    fieldShow();
                } else {
                    fieldHide();
                }
            }

            fieldChange($('#eqitems_id').val());
        });
    </script>
@endsection
