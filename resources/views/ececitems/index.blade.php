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
                        <h4>Ececitems</h4>
                    </section>
                    @include('flash::message')
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-hover table-bordered partners-table" style="width: 100%;"></table>
                        </div>
                    </div>
                    <div class="text-center"></div>
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
                ajax: "{{ route('ececitems.index') }}",
                columns: [
                    {
                        title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('ececitems.create') !!}"><i class="fa fa-plus-square"></i></a>',
                        data: 'action',
                        sClass: "text-center",
                        width: '200px',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {title: 'Elem', data: 'ecItemName', name: 'ecItemName'},
                    {title: 'Fűtés', data: 'heatingtypeName', name: 'heatingtypeName'},
                    {
                        title: 'Mennyiség',
                        data: 'piece',
                        render: $.fn.dataTable.render.number('.', ',', 0),
                        sClass: "text-right",
                        width: '75px',
                        name: 'piece'
                    },
                    {title: 'Me.', data: 'quantityName', name: 'quantityName'},
                ]
            });

        });
    </script>
@endsection


