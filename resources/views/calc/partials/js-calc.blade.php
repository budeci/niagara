<script type="text/javascript">
  $('.calories-move-step form').click(function(e) {
      e.preventDefault();
      var arr = [];
      var i = 0;
      $('.citrus_products_list_items li').each(function() {
          if ($(this).hasClass('list_active')) {
              arr[i] = $(this).data('id');
              i++;
          }
      });
      $('.calories-move-step input[name="food"]').val(arr);
      $(this).unbind().submit();
  });

  
  var $calcul_block = $('.calcul_block'),
      $body = $('html,body'),
      openSearch = function(target) {
        target.find('.calcul_description').data('open',true).slideToggle();
        return false;
      },
      closeSearch = function() {
        $calcul_block.find('.calcul_description').data('open',false).slideUp();
      };

      $calcul_block.on('click',function(e) {
          e.stopPropagation();
          if( !$(this).find('.calcul_description').data('open') ) {
            closeSearch($(this));
            openSearch($(this));
            $body.off( 'click' ).on( 'click', function(e) {
              closeSearch();
            });
          }
      });
</script>