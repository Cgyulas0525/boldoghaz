<!-- Contract Id Field -->
<div class="col-sm-12">
    {!! Form::label('contract_id', 'Contract Id:') !!}
    <p>{{ $contractdeadline->contract_id }}</p>
</div>

<!-- Constructionphase Id Field -->
<div class="col-sm-12">
    {!! Form::label('constructionphase_id', 'Constructionphase Id:') !!}
    <p>{{ $contractdeadline->constructionphase_id }}</p>
</div>

<!-- Deadline Field -->
<div class="col-sm-12">
    {!! Form::label('deadline', 'Deadline:') !!}
    <p>{{ $contractdeadline->deadline }}</p>
</div>

<!-- Performance Field -->
<div class="col-sm-12">
    {!! Form::label('performance', 'Performance:') !!}
    <p>{{ $contractdeadline->performance }}</p>
</div>

<!-- Commit Field -->
<div class="col-sm-12">
    {!! Form::label('commit', 'Commit:') !!}
    <p>{{ $contractdeadline->commit }}</p>
</div>

