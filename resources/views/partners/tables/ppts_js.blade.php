<script type="text/javascript">
    function pptsTable() {
        var table = $('.ppts-table').DataTable({
            serverSide: true,
            scrollY: 390,
            scrollX: true,
            order: [[1, 'asc']],
            paging: false,
            searching: false,
            ajax: "{{ route('partnerPartnerTypesIndex', $partners->id) }}",
            columns: [
                {title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('pptCreate', $partners->id) !!}"><i class="fa fa-plus-square"></i></a>',
                    data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                {title: 'Név', data: 'typesName', name: 'typesName'},
            ],
            buttons: [],
        });
        return table;
    }
</script>
