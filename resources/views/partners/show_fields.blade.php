<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $partners->name }}</p>
</div>

<!-- Registrationnumber Field -->
<div class="col-sm-12">
    {!! Form::label('registrationnumber', 'Registrationnumber:') !!}
    <p>{{ $partners->registrationnumber }}</p>
</div>

<!-- Taxnumber Field -->
<div class="col-sm-12">
    {!! Form::label('taxnumber', 'Taxnumber:') !!}
    <p>{{ $partners->taxnumber }}</p>
</div>

<!-- Live Field -->
<div class="col-sm-12">
    {!! Form::label('live', 'Live:') !!}
    <p>{{ $partners->live }}</p>
</div>

<!-- Commit Field -->
<div class="col-sm-12">
    {!! Form::label('commit', 'Commit:') !!}
    <p>{{ $partners->commit }}</p>
</div>

