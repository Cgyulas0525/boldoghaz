@extends('app_scaffold.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $partnertypes->parentFullName }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'ptChildStore']) !!}

            <div class="card-body">

                <div class="row">
                    @include('partnertypes.ptc_fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Ment', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('partnertypes.edit', $partnertypes->id ) }}" class="btn btn-default">Kilép</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection