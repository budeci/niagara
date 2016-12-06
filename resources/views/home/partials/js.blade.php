<script type="text/javascript">
    $(document).ready(function () {
        var carousel = $("#carousel").featureCarousel({});

    });
</script>

<script>
    $('.subscribe').click(function(event){
        event.preventDefault();
        var form = $(this).parents('form').serialize();
        var thisForm = $(this);
        $('.subscribe').attr('disabled','disabled');
        $.ajax({
            url : '{{route("subscribe")}}',
            method : 'POST',
            dataType : 'json',
            data : form,
            success : function(data){
                if(data == 'invalid') {
                    $('.error').append('* Cimpul este obligatoriu!');
                }
                else {
                    if(data == 'succes')
                        toastr.success("You are succesful subscribed!");
                    if(data == 'already')
                        toastr.error("You already subscribed!");
                        $('.modal').modal('hide');
                }
                setTimeout(function(){
                    thisForm.parents('form')[0].reset();
                    $('.error').html('');
                    $('.subscribe').removeAttr('disabled');
                } , 3000);
            }
        });
    });
</script>