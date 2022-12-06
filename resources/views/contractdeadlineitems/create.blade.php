@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $contractdeadline->contract->contractnumber }} számú szerződés {{$contractdeadline->constructionphase->name}} rész határidei</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'contractdeadlineitems.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('contractdeadlineitems.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Ment', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('contractdeadlineitemIndex', $contractdeadline->id) }}" class="btn btn-default">Kilép</a>
{{--                <a href="{!! route('contractDeadLineIndex', $contractdeadline->contract->id) !!}" class="btn btn-success">Kivitelezési fázisok</a>--}}
{{--                <a href="{!! route('contracts.show', $contractdeadline->contract->id) !!}" class="btn btn-success">Szerződés</a>--}}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
