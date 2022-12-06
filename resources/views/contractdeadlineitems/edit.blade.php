@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $contractdeadlineitem->contractdeadline->contract->contractnumber }} számú szerződés {{ $contractdeadlineitem->contractdeadline->constructionphase->name }} határidei</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($contractdeadlineitem, ['route' => ['contractdeadlineitems.update', $contractdeadlineitem->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('contractdeadlineitems.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Ment', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('contractdeadlineitemIndex', $contractdeadlineitem->contractdeadline->id) }}" class="btn btn-default">Kilép</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
