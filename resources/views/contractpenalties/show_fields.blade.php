<!-- Contract Id Field -->
<div class="col-sm-12">
    {!! Form::label('contract_id', 'Contract Id:') !!}
    <p>{{ $contractpenalty->contract_id }}</p>
</div>

<!-- Penaltytypes Id Field -->
<div class="col-sm-12">
    {!! Form::label('penaltytypes_id', 'Penaltytypes Id:') !!}
    <p>{{ $contractpenalty->penaltytypes_id }}</p>
</div>

<!-- Contractionphase Id Field -->
<div class="col-sm-12">
    {!! Form::label('contractionphase_id', 'Contractionphase Id:') !!}
    <p>{{ $contractpenalty->contractionphase_id }}</p>
</div>

<!-- Deadline Field -->
<div class="col-sm-12">
    {!! Form::label('deadline', 'Deadline:') !!}
    <p>{{ $contractpenalty->deadline }}</p>
</div>

<!-- Performance Field -->
<div class="col-sm-12">
    {!! Form::label('performance', 'Performance:') !!}
    <p>{{ $contractpenalty->performance }}</p>
</div>

<!-- Commit Field -->
<div class="col-sm-12">
    {!! Form::label('commit', 'Commit:') !!}
    <p>{{ $contractpenalty->commit }}</p>
</div>

