<script type="text/javascript">

    function allItem(modelName) {
        $.ajax({
            type:"GET",
            enctype: 'multipart/form-data',
            url: 'contractContentAllButton',
            data: { id: contractId, model: modelName},
            contentType: false,
            processData: false,
            success:function(data){
                /* $('.alert-success').html(data.success).fadeIn('slow');
                $('.alert-success').delay(3000).fadeOut('slow');*/
            }
        });
    }

    function allButton(modelName) {
        swal.fire({
            title: "Minden tétel!",
            text: "Biztosan hozzárendeli az összes tételt?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Mind",
            cancelButtonText: "Kilép"
        }).then((result) => {
            console.log(result);
            if (result.isConfirmed) {
                allItem('contractcontent');
                location.reload();
            }
        });
    });

</script>
