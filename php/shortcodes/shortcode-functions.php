<?php
// Remove Shortcodes
add_filter(
  'su/data/shortcodes',
  function($shortcodes) {

      return array_filter(
          $shortcodes,
          function($shortcode) {
              return isset($shortcode['group']) && 'shortcode-creator' === $shortcode['group'];
          }
      );

  },
  99,
  1
);

add_filter(
  'su/data/groups',
  function($groups) {

      return array_filter(
          $groups,
          function($group) {
              return in_array($group, array('all'));
          },
          ARRAY_FILTER_USE_KEY
      );

  }
);
// End Remove Shortcodes