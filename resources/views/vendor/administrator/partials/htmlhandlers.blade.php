<script>
$(function()
{
    $('[data-filter-type="date"]').datepicker({
        format: 'yyyy-mm-dd',
        clearBtn: false,
        multidate: false
    });

    $('[data-filter-type="daterange"]').daterangepicker({
        format: 'YYYY-MM-DD',
        clearBtn: true,
        multidate: true
    });
    $('[data-filter-type="time"]').datetimepicker({
        locale: 'ru',
        format: 'LT'
    });
    $('input[data-filter-type="number_range"]').slider({
        //
    });


    $('select[multiple]').each(function ()
    {
        var $this = $(this);
        var nullable = $this.data('nullable');
        $this.chosen({
            allow_single_deselect: nullable,
           /* no_results_text: window.admin.lang.select.nothing,
            placeholder_text_single: window.admin.lang.select.placeholder,
            placeholder_text_multiple: window.admin.lang.select.placeholder,*/
        });
    });
    var colorpicker = $('.colorpicker-component');
    colorpicker.colorpickerplus({
        color: "#000000",
        format: "hex"
    });
    colorpicker.on('changeColor', function(e,color){
        if(color==null) {
          //when select transparent color
          $(this).find('input').val('transparent');
          $(this).find('i').css('background-color', 'transparent');//tranparent
        } else {
            $(this).find('input').val(color);
            $(this).find('i').css('background-color', color);
        }
    });

    // activate language switcher
    $('button[data-locale]').click(function() {
        var fn = $(this), locale = fn.data('locale');
        var translatable = fn.closest('.translatable-block').find('.translatable');

        translatable.map(function(index, item) {
            var fn = $(item);
            if (fn.data('locale') == locale) {
                fn.removeClass('hidden');
            } else {
                fn.addClass('hidden');
            }
        });
    });

    $(document).ready(function(){
        $('input[type=checkbox]').iCheck({
            checkboxClass: 'icheckbox_minimal-purple',
            //radioClass: 'iradio_minimal-purple',
            increaseArea: '20%' // optional
        });
        $('input[name="1[slug]"], input[name="slug"]').parents('tr').hide();
    });
});
</script>