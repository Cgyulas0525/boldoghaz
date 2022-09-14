@section('scripts')
    @include('functions.sweetalert_js')

    <script type="text/javascript">

        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function itemDestroy() {
                $.ajax({
                    type:'GET',
                    enctype: 'multipart/form-data',
                    url: '{{ route("pbaDestroy", $partnerbankaccounts->id) }}',
                    contentType: false,
                    processData: false,
                    success:function(data){
                        /* $('.alert-success').html(data.success).fadeIn('slow');
                        $('.alert-success').delay(3000).fadeOut('slow');*/
                    }
                });
            }

            $('#destroyBtn').click(function (e) {
                swal.fire({
                    title: "Törlés!",
                    text: "Biztosan törli a tételt?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Törlés",
                    cancelButtonText: "Kilép"
                }).then((result) => {
                    console.log(result);
                    if (result.isConfirmed) {
                        itemDestroy();
                        var url = '{{ route("partners.edit", $partnerbankaccounts->partners_id) }}';
                        window.location.href = url;
                    }
                });
            });
        });


    </script>
@endsection
