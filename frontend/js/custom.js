/**
 * Created by roed on 09.02.2016.
 */
$(document).ready(function() {
    // ================== ISOTOPE =====================

    $('.category_filter li').click(function() {
        $(".category_filter li").removeClass("active");
        $(this).addClass("active");

        var selector = $(this).attr('data-filter');
        $(".category_items").isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    });

    var $grid = $('.category_items').imagesLoaded( function() {
        $grid.isotope({
            itemSelector: '.single_pictures',
            layoutMode: 'fitRows',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });
    });

});