<script type="text/javascript">
    $(document).ready(function () {
        var carousel = $("#carousel").featureCarousel({});

    });
</script>

<script>

    $('.subscribe').click(function(event){
        event.preventDefault();
        var form = $(this).parents('form').serialize();
        var thisForm = $(this).parent('form').parent('div');
        $.ajax({
            url : '{{route("subscribe")}}',
            method : 'POST',
            dataType : 'json',
            data : form,
            success : function(data){

                if(data == 'succes')
                toastr.success("You are succesful subscribed!");

                if(data == 'already')
                    toastr.error("You already subscribed!");

                $('.abonare_modal').modal('hide');
            }
        });
    });

</script>