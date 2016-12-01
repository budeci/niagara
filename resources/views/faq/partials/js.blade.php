<script>
$(document).ready(function() {
    var anchor = window.location.hash.replace("#", "");
    $(".collapse").collapse('hide');
    $("#" + anchor).collapse('show');
    
    $("[data-toggle='collapse']").click(function(event) {
	    $(".collapse").collapse('hide');
	    $($(this).attr('href')).collapse('show');
    });
});
</script>