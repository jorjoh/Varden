/**
 * Created by roed on 09.02.2016.
 */
$(document).ready(function() {
    // ================== ISOTOPE =====================

    $('.portfolio_filter li').click(function() {
        $(".portfolio_filter li").removeClass("active");
        $(this).addClass("active");

        var selector = $(this).attr('data-filter');
        $(".portfolio_items").isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    });

    var $grid = $('.portfolio_items').imagesLoaded( function() {
        $grid.isotope({
            itemSelector: '.single_item',
            layoutMode: 'fitRows',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });
    });

});