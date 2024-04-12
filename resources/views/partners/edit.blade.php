@extends('app_scaffold.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $partners->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($partners, ['route' => ['partners.update', $partners->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('partners.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Ment', ['class' => 'btn btn-primary saveButton']) !!}
                <a href="{{ route('partners.index') }}" class="btn btn-default">Kilép</a>
                <a href="{{ route('changePartnerLive', $partners->id) }}" class="btn btn-danger"> Aktív </a>
            </div>

            {!! Form::close() !!}

            <div class="col-lg-12 topmargin1em">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        @include('partners.tables.paddress', ["partners" => $partners])
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        @include('partners.tables.pba', ["partners" => $partners])
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        @include('partners.tables.ppts', ["partners" => $partners])
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        @include('partners.tables.pphones', ["partners" => $partners])
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        @include('partners.tables.pemails', ["partners" => $partners])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

