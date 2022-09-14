<script type="text/javascript">
    function paddressTable() {
        var table = $('.paddress-table').DataTable({
            serverSide: true,
            scrollY: 390,
            scrollX: true,
            order: [[1, 'asc']],
            paging: false,
            searching: false,
            ajax: "{{ route('partnerAddressIndex', $partners->id) }}",
            columns: [
                {title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('paCreate', $partners->id) !!}"><i class="fa fa-plus-square"></i></a>',
                    data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                {title: 'Cím', data: 'fullAddress', name: 'fullAddress'},
                {title: 'Típus', data: 'typeName', name: 'typeName'},
            ],
            buttons: [],
        });
        return table;
    }
</script>
