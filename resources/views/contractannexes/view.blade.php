@extends('app_scaffold.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $contractannex->contract->contractnumber }} számú szerződés
                        melléklete: {{ $contractannex->document_name }}</h1>
                </div>
            </div>
        </div>
        @include('pdfView.pdfView', ["file" => $contractannex->document_url, "format" => substr($contractannex->document_url, strrpos($contractannex->document_url, '.') + 1)])
        <div class="card-footer">
            <a href="{{ route('contractannexes.edit', $contractannex->id) }}" class="btn btn-default">Kilép</a>
        </div>
    </section>
@endsection
