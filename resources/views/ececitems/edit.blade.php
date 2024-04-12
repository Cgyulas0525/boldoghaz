@extends('app_scaffold.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $ececitems->ecName . " " . $ececitems->ecItemName }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($ececitems, ['route' => ['ececitems.update', $ececitems->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('ececitems.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Ment', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('energyClassifications.edit', $ececitems->energyclassifications_id) }}"
                   class="btn btn-default">Kilép</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
