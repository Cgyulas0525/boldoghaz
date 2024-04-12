<script type="text/javascript">
    function getTable() {
        var table = $('.partners-table').DataTable({
            serverSide: true,
            scrollY: 390,
            scrollX: true,
            paging: false,
            order: [[1, 'asc']],
            ajax: "{{ route('contractnoncontenttypes.index') }}",
            columns: [
                {title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('contractnoncontenttypes.create') !!}"><i class="fa fa-plus-square"></i></a>',
                    data: 'action', sClass: "text-center", width: '200px', name: 'action', orderable: false, searchable: false},
                {title: 'Név', data: 'name', name: 'name'},
                {title: 'Típus', data: 'typeName', name: 'typeName'},
            ]
        });
    }
</script>
