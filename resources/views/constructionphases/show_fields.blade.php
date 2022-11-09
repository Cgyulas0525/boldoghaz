<!-- Parent Id Field -->
<div class="col-sm-12">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <p>{{ $constructionphase->parent_id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $constructionphase->name }}</p>
</div>

<!-- Commit Field -->
<div class="col-sm-12">
    {!! Form::label('commit', 'Commit:') !!}
    <p>{{ $constructionphase->commit }}</p>
</div>

