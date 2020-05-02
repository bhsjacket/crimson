jQuery(document).ready(function() {
  jQuery(".article-content > p:last-child").append(" &#x25C6;"); // Add Tombstone
  mediumZoom('.article-content img'); // Image Zoom
  mediumZoom('.image-in-post > img'); // Image Zoom
  mediumZoom('.featured-image > img'); // Image Zoom
});

// Advanced Search Popup
$('.advanced-search').click(function(){
  $('#advanced-search-popup').toggleClass('popup-shown');
});
$('#advanced-search-popup .close').click(function(){
  $('#advanced-search-popup').toggleClass('popup-shown');
});

// Header
$(document).ready(function(){
  var donationToggle = false;
  var sectionsToggle = false;
  var searchToggle = false;

  $('.sections-toggle').click(function(){
      if($(window).width() > 925) {
          if(searchToggle == true) {
              $('.search-dropdown').fadeOut('fast', function(){
                  $('.sections-dropdown').fadeIn('fast');
                  sectionsToggle = true;
                  searchToggle = false;
              });
          } else if(donationToggle == true) {
              $('.donation-dropdown').fadeOut('fast', function(){
                  $('.sections-dropdown').fadeIn('fast');
                  sectionsToggle = true;
                  donationToggle = false;
              });
          } else {
              $('.sections-dropdown').slideToggle();
              sectionsToggle = !sectionsToggle;
          }
      } else {
          $('.mobile-menu-outer').fadeToggle('fast');
      }
  });

  $('.search-toggle').click(function(){
      $('.mobile-menu').toggleClass('search-expanded');
      if(sectionsToggle == true) {
          $('.sections-dropdown').fadeOut('fast', function(){
              $('.search-dropdown').fadeIn('fast');
              searchToggle = true;
              sectionsToggle = false;
          });
      } else if(donationToggle == true) {
          $('.donation-dropdown').fadeOut('fast', function(){
              $('.search-dropdown').fadeIn('fast');
              searchToggle = true;
              donationToggle = false;
          });
      } else {
          $('.search-dropdown').slideToggle();
          searchToggle = !searchToggle;
      }
      $('.search-field').focus();
  });

  $('header .header-button').click(function(){
      if(sectionsToggle == true) {
          $('.sections-dropdown').fadeOut('fast', function(){
              $('.donation-dropdown').fadeIn('fast');
              donationToggle = true;
              sectionsToggle = false;
          });
      } else if(searchToggle == true) {
          $('.search-dropdown').fadeOut('fast', function(){
              $('.donation-dropdown').fadeIn('fast');
          });
          donationToggle = true;
          searchToggle = false;
      } else {
          $('.donation-dropdown').slideToggle();
          donationToggle = !donationToggle;
      }
  });

  $(document).scroll(function(){
      if($(window).width() > 925) {
          if($(document).scrollTop() > 400) {
              if(sectionsToggle == true) {
                  $('.sections-dropdown').slideUp();
                  sectionsToggle = false;
              }
              $('.header-left, .header-center').fadeOut('fast', function(){
                  $('.header-right, .default-header').hide();
                  $('.sticky-sections-left').fadeIn('fast');
                  $('.sticky-sections-right, .sticky-sections').show();
              })
          } else {
              $('.sticky-sections-left').fadeOut('fast', function(){
                  $('.sticky-sections-right, .sticky-sections').hide();
                  $('.header-left, .header-center').fadeIn('fast');
                  $('.header-right, .default-header').show();
              });
          }
      } else {
          $('.sticky-sections-left').fadeOut('fast', function(){
              $('.sticky-sections-right, .sticky-sections').hide();
              $('.header-left, .header-center').fadeIn('fast');
              $('.header-right, .default-header').show();
          });
      }
  });

  $(window).resize(function(){
      if($(window).width() > 925) {
          $('.mobile-menu-outer').fadeOut('fast');
      }
  });
});

// Headline Balancer
/*
jQuery(document).ready(function() {
  waitForWebfonts(['Noe Display'], function() {
    textBalancer.initialize('.balance-text, h1, h2, h3, .headline, a h1, a h2, a h3'); // Start balancer.js
  });
})

function waitForWebfonts(fonts, callback) {
  var loadedFonts = 0;
  for(var i = 0, l = fonts.length; i < l; ++i) {
      (function(font) {
          var node = document.createElement('span');
          node.innerHTML = 'giItT1WQy@!-/#';
          node.style.position      = 'absolute';
          node.style.left          = '-10000px';
          node.style.top           = '-10000px';
          node.style.fontSize      = '300px';
          node.style.fontFamily    = 'sans-serif';
          node.style.fontVariant   = 'normal';
          node.style.fontStyle     = 'normal';
          node.style.fontWeight    = 'normal';
          node.style.letterSpacing = '0';
          document.body.appendChild(node);

          var width = node.offsetWidth;

          node.style.fontFamily = font + ', sans-serif';

          var interval;
          function checkFont() {
              if(node && node.offsetWidth != width) {
                  ++loadedFonts;
                  node.parentNode.removeChild(node);
                  node = null;
              }

              if(loadedFonts >= fonts.length) {
                  if(interval) {
                      clearInterval(interval);
                  }
                  if(loadedFonts == fonts.length) {
                      callback();
                      return true;
                  }
              }
          };

          if(!checkFont()) {
              interval = setInterval(checkFont, 50);
          }
      })(fonts[i]);
  }
};
*/

/*
jQuery(document).ready(function() {
  jQuery('#recommended_posts').hide();
})

jQuery(document).on('scroll', function() {

  fromTop = jQuery(document).scrollTop();
  fromBottom = jQuery(document).height() - jQuery(document).scrollTop() - jQuery(window).height()

  console.log(fromTop);
  console.log(fromBottom);

  if (fromTop < 400 || fromBottom < 600 || collision() == true) {
      jQuery('#recommended_posts').fadeOut('fast');
  }

  if (fromTop > 400 && fromBottom > 600 && collision() == false) {
      jQuery('#recommended_posts').fadeIn('fast');
  }

});

function collision() {
  var object1 = jQuery('#recommended_posts');
  var object2 = jQuery('.image-in-post');
  var x1 = object1.offset().left;
  var y1 = object1.offset().top;
  var h1 = object1.outerHeight(true);
  var w1 = object1.outerWidth(true);
  var b1 = y1 + h1;
  var r1 = x1 + w1;
  var x2 = object2.offset().left;
  var y2 = object2.offset().top;
  var h2 = object2.outerHeight(true);
  var w2 = object2.outerWidth(true);
  var b2 = y2 + h2;
  var r2 = x2 + w2;

  if (b1 < y2 || y1 > b2 || r1 < x2 || x1 > r2) return false;
  return true;
}
*/