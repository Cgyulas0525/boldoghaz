@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Kiegészítő elemek</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'additionalelements.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('additionalelements.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Ment', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('additionalelements.index') }}" class="btn btn-default">Kilép</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection