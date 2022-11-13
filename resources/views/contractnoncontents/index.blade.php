@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.datatables_css')
    @include('layouts.costumcss')
@endsection

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary" >
            <div class="box-body">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <section class="content-header">
                        <h4>{{ $contract->contractnumber }} számú szerződés nem tartalmazza</h4>
                    </section>
                    @include('flash::message')
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body"  >
                            <table class="table table-hover table-bordered partners-table" style="width: 100%;"></table>
                        </div>
                    </div>
                    <div class="text-center"></div>
                </div>
                <div class="col-lg-3">
                    <div class="card-footer" style="float: left;">
                        <a href="#" class="btn btn-success" id="allButton">Mind</a>
                        <a href="{!! route('contracts.show', $contract->id) !!}" class="btn btn-default">Vissza</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.datatables_js')
    @include('functions.contractChild.contractChild_js')

    <script type="text/javascript">

        var action = '';
        var table;
        var contractId = <?php echo $contract->id; ?>;

        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // javítani a noncontentre!!!!!

            $.ajax({
                type:"GET",
                url:"{{url('contractTypesNotIn')}}",
                data: { id: contractId, table: 'contractnoncontent' },
                success:function(res){
                    if(res){
                        if (res > 0) {
                            console.log(res)
                            action = '<a class="btn btn-primary" title="Felvitel" href="{!! route('contractNonContentCreate', $contract->id) !!}"><i class="fa fa-plus-square"></i></a>';
                            $("#allButton").show();
                        } else {
                            $("#allButton").hide();
                        }
                    }
                    table = $('.partners-table').DataTable({
                        serverSide: true,
                        scrollY: 390,
                        scrollX: true,
                        order: [[2, 'asc']],
                        paging: false,
                        ajax: "{{ route('contractnoncontentIndex', $contract->id) }}",
                        columns: [
                            {title: action,
                                data: 'action', sClass: "text-center", width: '200px', name: 'action', orderable: false, searchable: false},
                            {title: 'Nem tartalmazza', data: 'contractnoncontenttypes', name: 'contractnoncontenttypes'},
                            {title: 'Id', data: 'id', name: 'id'},
                        ],
                        columnDefs: [
                            {
                                "targets": [ 2 ],
                                "visible": false
                            },
                            {
                                "targets": [ 0, 1 ],
                                "orderable": false
                            },
                        ]
                    });
                }
            });

        });

        $('#allButton').click(function (e) {
            allButton('contractnoncontent');
        });

    </script>
@endsection


