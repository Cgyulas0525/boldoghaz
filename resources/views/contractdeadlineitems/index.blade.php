@extends('app_scaffold.app')

@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('app_scaffold.css.datatables_css')
    @include('app_scaffold.css.costumcss')
@endsection

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <section class="content-header">
                        <h4>{{ $contractdeadline->contract->contractnumber }} számú
                            szerződés {{ $contractdeadline->constructionphase->name }} rész határidei</h4>
                    </section>
                    @include('flash::message')
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-hover table-bordered partners-table" style="width: 100%;"></table>
                        </div>
                    </div>
                    <div class="text-center"></div>
                    <div class="col-lg-3">
                        <div class="card-footer" style="float: left;">
                            <a href="{!! route('contractDeadLineIndex', $contractdeadline->contract->id) !!}"
                               class="btn btn-success">Kivitelezési fázisok</a>
                            <a href="{!! route('contracts.show', $contractdeadline->contract->id) !!}"
                               class="btn btn-success">Szerződés</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('app_scaffold.js.datatables_js')

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.partners-table').DataTable({
                serverSide: true,
                scrollY: 390,
                scrollX: true,
                order: [[1, 'asc']],
                paging: false,
                ajax: "{{ route('contractdeadlineitemIndex', $contractdeadline->id) }}",
                columns: [
                    {
                        title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('contractDeadLineitemCreate', $contractdeadline->id) !!}"><i class="fa fa-plus-square"></i></a>',
                        data: 'action',
                        sClass: "text-center",
                        width: '200px',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        title: 'Határidő', data: 'deadline', render: function (data, type, row) {
                            return data ? moment(data).format('YYYY.MM.DD') : '';
                        }, sClass: "text-center", width: '150px', name: 'deadline'
                    },
                    {
                        title: 'Teljesítés', data: 'performance', render: function (data, type, row) {
                            return data ? moment(data).format('YYYY.MM.DD') : '';
                        }, sClass: "text-center", width: '150px', name: 'performance'
                    },
                ],
                buttons: [],
            });

        });
    </script>
@endsection


