<script type="text/javascript">

    function allButton(modelName, contractId) {
        swal.fire({
            title: "Minden tétel!",
            text: "Biztosan hozzárendeli az összes tételt?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Mind",
            cancelButtonText: "Kilép"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type:"GET",
                    enctype: 'multipart/form-data',
                    url:"{{url('apiAllButton')}}",
                    data: { table: modelName, id: contractId},
                    success:function(response){
                        console.log('ok');
                        /* $('.alert-success').html(data.success).fadeIn('slow');
                        $('.alert-success').delay(3000).fadeOut('slow');*/
                    },
                    error: function (response) {
                        console.log('Error:', response);
                    }
                });
                location.reload();
            }
        });
    }

</script>
