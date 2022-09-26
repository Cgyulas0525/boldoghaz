@include('functions.ajax_js')
@include('functions.settlement.postCodeSettlement_js')

<script type="text/javascript">
    $(function () {
        ajaxSetup();
        $('#postcode').change(function() {
            postCodeSettlement();
        });
    });
</script>
<?php
