@extends('app_scaffold.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $contracttypes->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($contracttypes, ['route' => ['contracttypes.update', $contracttypes->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('contracttypes.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Ment', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('contracttypes.index') }}" class="btn btn-default">Kilép</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
