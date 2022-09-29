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
                {title: 'Elsőleges', data: 'primeValue', name: 'primeValue'},
                {title: 'Aktív', data: 'activeValue', name: 'activeValue'},
            ],
            buttons: [],
            fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                if (aData.active == 0) {
                    $('td', nRow).css('background-color', 'red');
                }
                if (aData.prime == 1) {
                    $('td', nRow).css('background-color', 'lightblue');
                }
            }
        });
        return table;
    }
</script>
