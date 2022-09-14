<script type="text/javascript">
    function pphonesTable() {
        var table = $('.pphones-table').DataTable({
            serverSide: true,
            scrollY: 390,
            scrollX: true,
            order: [[1, 'asc']],
            paging: false,
            searching: false,
            ajax: "{{ route('partnerPhonenumbersIndex', $partners->id) }}",
            columns: [
                {title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('pphoneCreate', $partners->id ) !!}"><i class="fa fa-plus-square"></i></a>',
                    data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                {title: 'Telefonszám', data: 'phonenumber', name: 'phonenumber'},
                {title: 'Típus', data: 'typeName', name: 'typeName'},
            ],
            buttons: [],
        });
        return table;
    }
</script>
