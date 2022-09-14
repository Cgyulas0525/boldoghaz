<script type="text/javascript">
    function pbaTable() {
        var table = $('.pba-table').DataTable({
            serverSide: true,
            scrollY: 390,
            scrollX: true,
            order: [[1, 'asc']],
            paging: false,
            searching: false,
            ajax: "{{ route('partnerBAIndex', $partners->id) }}",
            columns: [
                {title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('pbaCreate', $partners->id) !!}"><i class="fa fa-plus-square"></i></a>',
                    data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                {title: 'Pénzintézet', data: 'institutName', name: 'institutName'},
                {title: 'Bankszámlaszám', data: 'accountnumber', name: 'accountnumber'},
            ],
            buttons: [],
        });
        return table;
    }
</script>
