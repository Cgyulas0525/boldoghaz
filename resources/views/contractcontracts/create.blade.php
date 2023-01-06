@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $contract->contractnumber }} számú szerződés alvállalkozói szerződés</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'contractcontracts.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('formGroup.formGroupFromController', ['array' => App\Http\Controllers\ContractcontractController::fields(isset($contract) ? $contract : null, isset($contractcontracts) ? $contractcontracts : null),
                                                                   'scriptFile' => 'formGroup.emptyScript'])
{{--                    @include('contractcontracts.fields')--}}
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Ment', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('contractcontracts.index', ['id' => $contract->id]) }}" class="btn btn-default">Kilép</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
