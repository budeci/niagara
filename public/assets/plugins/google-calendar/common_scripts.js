$(document).ready(function() {
    initModal('.js-modal_filter', 'modal_filter mfp-move-from-top', 'inline');
    initModal('.js-modal', 'modal mfp-zoom-in', 'inline');
    initModal('.js-modal_bottom', 'modal_bottom mfp-zoom-in');
    initModal('.js-modal_card', 'modal_card mfp-move-from-top', 'inline');
    initModal('.js-modal_vac', 'modal_vac mfp-move-from-top', 'ajax');
    initModal('.js-modal_votes', 'modal_votes mfp-move-from-top', 'inline');
    initModal('.js-modal_subs', 'modal_subscription mfp-move-from-top', 'inline');
    initModal('.js-modal_map', 'modal_map mfp-move-from-top', 'ajax');
    initModal('.js-modal_persData', 'modal_personalData mfp-move-from-top', 'ajax');
    initModal('#club-modal__map_link', 'modal_map mfp-move-from-top', 'inline');
    initModal('.js-modal_event', 'modal_event mfp-move-from-top', 'ajax');
});
var $currentFilter;
$(document).on('click', '.js-modal_filter', function() {
    $currentFilter = $(this);
})

function initModal(e, className, type) {
    $(e).magnificPopup({
        callbacks: {
            ajaxContentAdded: function() {
                if (e == '.js-modal_map') {
                    initMap('club-map_modal', sampleData);
                }
            }
        },
        removalDelay: 400,
        mainClass: className,
        closeOnContentClick: false,
        type: type || 'ajax',
    })
}

function initModalColorbox(e, className, inline) {
    $(e).colorbox({
        onComplete: function() {
            fixedBody();
            setTimeout(function() {
                $.colorbox.resize();
            }, 100);
            setTimeout(function() {
                $.colorbox.resize();
            }, 150);
            if ($(this).is('.js-modal_filter')) {
                $currentFilter = $(this);
            }
        },
        onOpen: function() {},
        onLoad: function() {},
        onClosed: function() {
            unFixedBody();
        },
        returnFocus: false,
        className: className,
        inline: inline,
        transition: 'none',
        opacity: 0.7
    });
}
if ($(".js-scroll-bar").length > 0) {
    initScrollBar();
}

function initScrollBar() {
    $(".js-scroll-bar").mCustomScrollbar({
        autoHideScrollbar: true,
        scrollInertia: 700,
        callbacks: {
            onUpdate: function() {}
        }
    });
}
var $scrollTop = 0,
    $bodyPosition = 0;
$(window).on('load', function() {
    $scrollTop = window.pageYOffset;
});
$(document).on('scroll', function() {
    $scrollTop = window.pageYOffset;
});

function fixedBody() {
    var $page = $('.l-page');
    $bodyPosition = $scrollTop;
    $page.addClass('is-fixed').css('top', -$bodyPosition);
};

function unFixedBody() {
    var $page = $('.l-page');
    if ($page.is('.is-fixed')) {
        $page.removeClass('is-fixed');
        $(document).scrollTop($bodyPosition);
    }
};

function clubColumn(el) {
    var $clubCollection = $(el).find('.clubs-choose__item');
    var $clubColumn = $(el).find('.clubs-choose__col');
    $clubColumn.removeClass('is-empty');
    $clubColumn.empty();
    $clubCollection.each(function(index, value) {
        var D = 1;
        if (screenWidth < 768) {
            D = 1
        } else if (screenWidth >= 768 && screenWidth < 1024) {
            D = 2;
            for (var i = 2; i < 5; i++) {
                $clubColumn.eq(i).addClass('is-empty');
            }
        } else if (screenWidth >= 1024 && screenWidth < 1366) {
            D = 3;
            for (var i = 3; i < 5; i++) {
                $clubColumn.eq(i).addClass('is-empty');
            }
        } else if (screenWidth >= 1366) {
            D = 5
        }
        var colLength1 = 1,
            colLength2 = 2,
            colLength3 = 3,
            colLength4 = 4,
            colLength5 = 5;
        if (parseInt($clubCollection.length / D) > 0) {
            colLength1 = parseInt($clubCollection.length / D) + ($clubCollection.length % D);
            colLength2 = colLength1 + parseInt($clubCollection.length / D);
            colLength3 = colLength2 + parseInt($clubCollection.length / D);
            colLength4 = colLength3 + parseInt($clubCollection.length / D);
            colLength5 = colLength4 + parseInt($clubCollection.length / D);
        }
        $clubCollection.each(function(i, val) {
            if (i < colLength1) {
                $(val).appendTo($clubColumn.eq(0));
            } else if (i >= colLength1 && i < colLength2) {
                $(val).appendTo($clubColumn.eq(1));
            } else if (i >= colLength2 && i < colLength3) {
                $(val).appendTo($clubColumn.eq(2));
            } else if (i >= colLength3 && i < colLength4) {
                $(val).appendTo($clubColumn.eq(3));
            } else if (i >= colLength4 && i < colLength5) {
                $(val).appendTo($clubColumn.eq(4));
            }
        });
    });
};