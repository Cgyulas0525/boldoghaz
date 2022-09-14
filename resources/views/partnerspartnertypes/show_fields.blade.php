<!-- Partnertypes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('partnertypes_id', 'Típus:') !!}
    {!! Form::text('partnertypes', $partnerspartnertypes->typesName, ['class' => 'form-control','maxlength' => 100,'id' => 'name', 'readonly' => 'true']) !!}
</div>

<!-- Commit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commit', 'Megjegyzés:') !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit', 'readonly' => "true"]) !!}
</div>

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
                    url: '{{ route("partnerPartnerTypesDestroy", $partnerspartnertypes->id) }}',
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
                        var url = '{{ route("partners.edit", $partnerspartnertypes->partner_id) }}';
                        window.location.href = url;
                    }
                });
            });
        });


    </script>
@endsection
