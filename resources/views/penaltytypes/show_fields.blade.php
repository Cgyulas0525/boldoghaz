<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $penaltytypes->name }}</p>
</div>

<!-- Businessrate Field -->
<div class="col-sm-12">
    {!! Form::label('businessrate', 'Businessrate:') !!}
    <p>{{ $penaltytypes->businessrate }}</p>
</div>

<!-- Daypenalty Field -->
<div class="col-sm-12">
    {!! Form::label('daypenalty', 'Daypenalty:') !!}
    <p>{{ $penaltytypes->daypenalty }}</p>
</div>

<!-- Daypenaltymax Field -->
<div class="col-sm-12">
    {!! Form::label('daypenaltymax', 'Daypenaltymax:') !!}
    <p>{{ $penaltytypes->daypenaltymax }}</p>
</div>

<!-- Commit Field -->
<div class="col-sm-12">
    {!! Form::label('commit', 'Commit:') !!}
    <p>{{ $penaltytypes->commit }}</p>
</div>

