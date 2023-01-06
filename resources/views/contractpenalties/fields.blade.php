<!-- Contract Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_id', 'Contract Id:') !!}
    {!! Form::number('contract_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Penaltytypes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penaltytypes_id', 'Penaltytypes Id:') !!}
    {!! Form::number('penaltytypes_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Contractionphase Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('constructionphase_id', 'Contractionphase Id:') !!}
    {!! Form::number('constructionphase_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deadline', 'Deadline:') !!}
    {!! Form::text('deadline', null, ['class' => 'form-control','id'=>'deadline']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#deadline').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Performance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('performance', 'Performance:') !!}
    {!! Form::text('performance', null, ['class' => 'form-control','id'=>'performance']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#performance').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Commit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commit', 'Commit:') !!}
    {!! Form::text('commit', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>
