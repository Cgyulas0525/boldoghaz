@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $retentiontypes->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($retentiontypes, ['route' => ['retentiontypes.update', $retentiontypes->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('retentiontypes.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Ment', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('retentiontypes.index') }}" class="btn btn-default">Kilép</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
