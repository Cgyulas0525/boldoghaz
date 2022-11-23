<!-- Contractdeadline Id Field -->
<div class="col-sm-12">
    {!! Form::label('contractdeadline_id', 'Contractdeadline Id:') !!}
    <p>{{ $contractdeadlineitem->contractdeadline_id }}</p>
</div>

<!-- Deadline Field -->
<div class="col-sm-12">
    {!! Form::label('deadline', 'Deadline:') !!}
    <p>{{ $contractdeadlineitem->deadline }}</p>
</div>

<!-- Performance Field -->
<div class="col-sm-12">
    {!! Form::label('performance', 'Performance:') !!}
    <p>{{ $contractdeadlineitem->performance }}</p>
</div>

<!-- Commit Field -->
<div class="col-sm-12">
    {!! Form::label('commit', 'Commit:') !!}
    <p>{{ $contractdeadlineitem->commit }}</p>
</div>

