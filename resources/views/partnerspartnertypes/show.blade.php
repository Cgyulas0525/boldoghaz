@extends('app_scaffold.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $partnerspartnertypes->partnerName }} {{ $partnerspartnertypes->typesName }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('partnerspartnertypes.show_fields')
                </div>
            </div>

            <div class="card-footer">
                <a href="#" id="destroyBtn" class="btn btn-danger destroyBtn">Törlés</a>
                <a href="{{ route('partners.edit', $partnerspartnertypes->partner_id) }}"
                   class="btn btn-default">Kilép</a>
            </div>

        </div>
    </div>
@endsection
