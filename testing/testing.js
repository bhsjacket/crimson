var is_colliding = function( $div1, $div2 ) {
	var d1_offset             = $div1.offset();
	var d1_height             = $div1.outerHeight( true );
	var d1_width              = $div1.outerWidth( true );
	var d1_distance_from_top  = d1_offset.top + d1_height;
	var d1_distance_from_left = d1_offset.left + d1_width;

	var d2_offset             = $div2.offset();
	var d2_height             = $div2.outerHeight( true );
	var d2_width              = $div2.outerWidth( true );
	var d2_distance_from_top  = d2_offset.top + d2_height;
	var d2_distance_from_left = d2_offset.left + d2_width;

	var not_colliding = ( d1_distance_from_top < d2_offset.top || d1_offset.top > d2_distance_from_top || d1_distance_from_left < d2_offset.left || d1_offset.left > d2_distance_from_left );

	return ! not_colliding;
};

$(document).ready(function(){
    $(document).scroll(function(){
        if($(document).scrollTop() > 500) {
            $('.recommended-outer').fadeIn('fast');
        } else {
            $('.recommended-outer').fadeOut('fast');
        }

        $('.image-in-post').each(function(){
            if($(this).width() > 600) {
                if(is_colliding($(this), $('.recommended-posts'))) {
                    $('body').css('background-color', 'red');
                    $('.recommended').fadeOut('fast');
                } else {
                    $('body').delay(100).css('background-color', 'green');
                    $('.recommended').fadeIn('fast');
                }
            }
        })
    })
});

var lessThan = true;
$(document).ready(function(){
    $(document).scroll(function(){
        if($(document).scrollTop() > 500 && lessThan == true) {
            lessThan = false;
            $('.recommended-outer').fadeIn('fast');
        } else if($(document).scrollTop() < 500) {
            lessThan = true;
            $('.recommended-outer').fadeOut('fast');
        }

        $('.image-in-post').each(function(){
            if($(this).width() > 600) {
                if(is_colliding($(this), $('.recommended-posts'))) {
                    $('body').css('background-color', 'red');
                    $('.recommended').fadeOut('fast');
                } else {
                    $('body').delay(100).css('background-color', 'green');
                    $('.recommended').fadeIn('fast');
                }
            }
        })
    })
});