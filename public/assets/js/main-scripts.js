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
 $('.cartele_oferts_slide').slick({
     dots: false,
    infinite: true,
    arrows:false,
    speed: 300,
     autoplay:true,
    centerMode:false,
    slidesToScroll:3,
    slidesToShow: 7,
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
      slidesToScroll: 4,
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
    $('.calculator_count_block').find('.result_calcul').toggleClass('hidden');
  });

  $('.send-form').click(function(event){
    event.preventDefault();
    var thisForm = $(this).parents('form');
    var form = thisForm.serialize();

    // Clear previous alerts
    thisForm.find('.alert').remove();

    $.ajax({
      url : thisForm.attr('action') || '/call-us',
      method : 'POST',
      dataType : 'json',
      data : form,
      success : function(data){
        thisForm.append('<div class="alert alert-success"> <ul> <li>Message sent successfully!</li> </ul> </div>');
      },
      error: function (data) {
        var r = {};
        try {
          r = jQuery.parseJSON(data.responseText);
        } catch(e) {
          r = { error: 'An unexpected error occurred.' };
        }

        var errorHtml = '<div class="alert alert-danger"><ul>';
        if (r.name) errorHtml += '<li>' + r.name + '</li>';
        if (r.phone) errorHtml += '<li>' + r.phone + '</li>';
        if (r.error) errorHtml += '<li>' + r.error + '</li>';
        errorHtml += '</ul></div>';

        thisForm.append(errorHtml);
        thisForm.find('input[type=submit]').prop('disabled', true);

        setTimeout(function(){
            thisForm.find(".alert").fadeOut(function() { $(this).remove(); });
            thisForm.find('input[type=submit]').prop('disabled', false);
        } , 4000);
      }
    });
  });

/*
    $(".fancybox").click(function() {
        $.fancybox({
            'padding'       : 0,
            'autoScale'     : false,
            'transitionIn'  : 'none',
            'transitionOut' : 'none',
            'title'         : this.title,
            'width'         : 680,
            'height'        : 495,
            'href'          : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
            'type'          : "iframe",
            'iframe'           : {
                'wmode'        : 'transparent',
                'allowfullscreen'   : 'true'
            },
            onComplete : function () {
                $("#fancybox-frame").attr("allowfullscreen", "allowfullscreen")
            }
        });


        return false;
    });*/

    $(".fancybox").fancybox({
         'type' : "iframe",
        'padding'       : 0,
        'autoScale'     : false,
        'transitionIn'  : 'none',
        'transitionOut' : 'none',
        'title'         : this.title,
        'width'         : 680,
        'height'        : 495,
       /* 'href'          : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),*/
        onComplete : function () {
            $("#fancybox-frame").attr("allowfullscreen", "allowfullscreen")
        }
    });


});


