@section('scripts')
    @include('app_scaffold.js.datatables_js')
    @include('functions.ajax_js')
    @include('pages.project-dictionaries.contractcontenttypes.js.index.table-js')
    <script type="text/javascript">
        $(function () {
            ajaxSetup();
            getTable();
        });
    </script>
@endsection
