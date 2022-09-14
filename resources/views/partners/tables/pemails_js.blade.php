<script type="text/javascript">
    function pemailsTable() {
        var table = $('.pemails-table').DataTable({
            serverSide: true,
            scrollY: 390,
            scrollX: true,
            order: [[1, 'asc']],
            paging: false,
            searching: false,
            ajax: "{{ route('partnerEmailsIndex', $partners->id) }}",
            columns: [
                {title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('peCreate', $partners->id) !!}"><i class="fa fa-plus-square"></i></a>',
                    data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                {title: 'Email cím', data: 'email', name: 'email'},
            ],
            buttons: [],
        });
        return table;
    }
</script>
