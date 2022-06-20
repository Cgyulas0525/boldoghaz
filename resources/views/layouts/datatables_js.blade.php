<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

<script>
    $(function () {
        function currencyFormatDE(num) {
           return (
             num
               .toFixed(0) // always two decimal digits
               .replace('.', ',') // replace decimal point character with ,
               .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
           ) // use . as a separator
         }

        $.extend( true, $.fn.dataTable.defaults, {
            language: {
               "sEmptyTable": "Nincs rendelkezésre álló adat",
               "sInfo": "Találatok: _START_ - _END_ Összesen: _TOTAL_",
               "sInfoEmpty": "Nulla találat",
               "sInfoFiltered": "(_MAX_ összes rekord közül szűrve)",
               "sInfoPostFix": "",
               "sInfoThousands": " ",
               "sLengthMenu": "_MENU_ találat oldalanként",
               "sLoadingRecords": "Betöltés...",
               "sProcessing": "Feldolgozás...",
               "sSearch": "Keresés:",
               "sZeroRecords": "Nincs a keresésnek megfelelő találat",
               "oPaginate": {
                   "sFirst": "Első",
                   "sPrevious": "Előző",
                   "sNext": "Következő",
                   "sLast": "Utolsó"
               },
               "oAria": {
                   "sSortAscending": ": aktiválja a növekvő rendezéshez",
                   "sSortDescending": ": aktiválja a csökkenő rendezéshez"
               },
               "select": {
                   "rows": {
                       "_": "%d sor kiválasztva",
                       "0": "",
                       "1": "1 sor kiválasztva"
                   }
               }
            },
            processing: true,
            pagingType: 'full_numbers',
            select: true,
            scrollY: 500,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Mind"]],
        } );
    } );
</script>

