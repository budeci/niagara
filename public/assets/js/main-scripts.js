$(document).ready(function() {

  $('.news_slide').slick({
      dots: true,
      infinite: true,
      arrows:false,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
  });

  $('.news_niagara_slide').slick({
    dots: false,
    infinite: true,
    arrows:true,
    speed: 300,
    slidesToShow: 4,
    prevArrow: ".prev",
    nextArrow: ".next",
    autoplay:true,
    adaptiveHeight: true,
      responsive: [
    {
        breakpoint: 1400,
        settings: {
            arrows:true,
          slidesToShow: 4
        }
      },
      {
        breakpoint: 1024,
        settings: {
          arrows:true,
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows:false,
          slidesToShow: 1
        }
      }
    ]
  });


  $('.first_slide').slick({
    dots: true,
    infinite: true,
    arrows:false,
    speed: 300,
    slidesToShow: 1,
    prevArrow: ".prev",
    nextArrow: ".next",
    adaptiveHeight: true
  });



  $('.cartele_slide').slick({
    dots: true,
    infinite: true,
    arrows:false,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
  });


  $('.treners_slide').slick({
      dots: false,
      infinite: true,
      arrows:true,
      prevArrow: ".prev_tren",
      nextArrow: ".next_tren",
      speed: 300,
      centerMode:false,
      slidesToShow: 1
    });


  $('.corporative_slide').slick({
    dots: false,
    infinite: true,
    arrows:false,
    speed: 300,
    centerMode:false,
    slidesToShow: 5,
     responsive: [
    {
      breakpoint: 1400,
      settings: {
      arrows: false,
      centerMode: false,
      centerPadding: '40px',
      slidesToShow: 4
      }
    },
    {
      breakpoint: 1024,
      settings: {
      arrows: false,
      centerMode: false,
      centerPadding: '40px',
      slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
      arrows: false,
      centerMode: false,
      centerPadding: '40px',
      slidesToShow: 1
        }
    }
    ]
  });


  $('.index_center_slide').slick({
    centerMode: true,
    arrows:false,
    draggable:true,
    focusOnSelect: true,
    centerPadding: '60px',
    slidesToShow: 7,
    autoplay:true,
    responsive: [
    {
      breakpoint: 1400,
      settings: {
      arrows: false,
      centerMode: true,
      slidesToScroll: 4,
      centerPadding: '40px',
      slidesToShow: 5
      }
    },
    {
      breakpoint: 1024,
      settings: {
      arrows: false,
      lidesToScroll: 4,
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 3
      }
    },
    {
      breakpoint: 789,
      settings: {
      arrows: false,
      slidesToScroll: 4,
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
      arrows: false,
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 1
      }
    }
    ]
  });

  var $grid = $('.grid').isotope();

  $('.filter-button-group').on( 'click', 'button', function() {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
    $('.filter-button-group button').removeClass('is-checked');
    $(this).addClass('is-checked');
  });


  $('.for_press .tab-pane').children('div.row:nth-child(-n+3)').css('display','block');
	var x=3;
    $('.show_div').click(function() {
        var parent =  $(this).parents('.tab-pane');
        var row_hidden = parent.children('div.row:hidden').length;
        if (row_hidden <= 3) {
          $(this).parents('div.row').hide();
        }
        if (row_hidden >= 1) {
          parent.children('div.row:hidden:lt('+x+')').slideDown();
          var row_hidden2 = parent.children('div.row:hidden').length;
          if (row_hidden2 < 1) {
            $(this).parents('div.row').hide();
          }
        }
    });


 $('.citrus_products_list_items li').click(function(){
 	var item = $(this);
 	if(!item.hasClass('list_active')) {
 		$(this).addClass('list_active');
 	}
 	else {
 		$(this).removeClass('list_active');
 	}
 });

  //   

  //Header menu
  $(".menu-collapsed_header").click(function() {
    $(this).toggleClass("menu-expanded_header");
  });
  // end Header menu


  //Footer menu
  $(".menu-collapsed_footer").click(function() {
    $(this).toggleClass("menu-expanded_footer");
  });
  //end Footer menu

  $('.submit_form, .close_calcul_block').click(function(){
  	var resultBlock = $('.calculator_count_block').find('.result_calcul');

  	if(resultBlock.hasClass('hidden')){
  		resultBlock.removeClass('hidden');
  	}
  	else {
  		resultBlock.addClass('hidden');
  	}

  });
});


