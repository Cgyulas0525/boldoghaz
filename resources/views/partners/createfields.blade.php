<!-- Name Field -->
<div class="col-lg-4">
    {!! Form::label('name', 'Név:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'id' => 'name']) !!}
</div>

<div class="col-lg-2">
    {!! Form::label('live', 'Élő:') !!}
    {!! Form::select('live', App\Classes\Utility\utilityClass::igenNemDDDW(), null,
             ['class'=>'select2 form-control', 'id' => 'live']) !!}
</div>

<div class="col-lg-3">
    {!! Form::label('taxnumber', 'Adószám:') !!}
    {!! Form::text('taxnumber', null, ['class' => 'form-control','maxlength' => 25,'id' => 'taxnumber', 'data-inputmask'=>"'mask': '99999999-9-99'"]) !!}
</div>

<!-- Registrationnumber Field -->
<div class="col-lg-3">
    {!! Form::label('registrationnumber', 'Cégjegyzékszám:') !!}
        {!! Form::text('registrationnumber', null, ['class' => 'form-control','maxlength' => 25,'id' => 'registrationnumber', 'data-inputmask'=>"'mask': '99-99-999999'"]) !!}
</div>


<!-- Commit Field -->
<div class="col-lg-12">
    {!! Form::label('commit', 'Megjegyzés:') !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
</div>

@section('scripts')
    <script type="text/javascript">

        $('#taxnumber').inputmask();
        $('#registrationnumber').inputmask();

    </script>
@endsection
