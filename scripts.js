jQuery(document).ready(function($) {
  $(".article-content > p:last-child").append(" &diams;");
});

jQuery(document).ready(function() {
  jQuery('#recommended_posts').hide();
})

jQuery(document).on('scroll', function() {

  fromTop = jQuery(document).scrollTop();
  fromBottom = jQuery(document).height() - jQuery(document).scrollTop() - jQuery(window).height()

  console.log(fromTop);
  console.log(fromBottom);

  if (fromTop < 400 || fromBottom < 600/* || collision() == true*/) {
      jQuery('#recommended_posts').fadeOut('fast');
  }

  if (/*collision() == false && */fromTop > 400 && fromBottom > 600) {
      jQuery('#recommended_posts').fadeIn('fast');
  }

});

/*

function collision() {
  var object1 = jQuery('#recommended_posts');
  var object2 = jQuery('.image-in-post img');
  var x1 = object1.offset().right;
  var y1 = object1.offset().top;
  var h1 = object1.outerHeight(true);
  var w1 = object1.outerWidth(true);
  var b1 = y1 + h1;
  var r1 = x1 + w1;
  var x2 = object2.offset().right;
  var y2 = object2.offset().top;
  var h2 = object2.outerHeight(true);
  var w2 = object2.outerWidth(true);
  var b2 = y2 + h2;
  var r2 = x2 + w2;

  if (b1 < y2 || y1 > b2 || r1 < x2 || x1 > r2) return false;
  return true;
}

*/