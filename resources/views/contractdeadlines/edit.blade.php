@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $contractdeadline->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($contractdeadline, ['route' => ['contractdeadlines.update', $contractdeadline->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('contractdeadlines.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Ment', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('contractDeadLineIndex', $contractdeadline->contract_id) }}" class="btn btn-default">Kilép</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
