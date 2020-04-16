<?php
// Shortcode Editor Styles
add_action('admin_head', 'shortcode_styles');

function shortcode_styles() {
  echo '<style>
    #su-generator-tools,
    #su-generator-search-pro-tip,
    #su-generator-filter,
    .su-generator-presets,
    #insert-media-button {
      display: none!important;
    } 
    #su-generator-search {
      margin: 0;
      width: calc(100% - 20px)!important;
    }
    #su-generator-search:focus {
      border-color: #800000!important;
      box-shadow: 0 0 0 1px #800000!important;
    }
    #su-generator {
      max-width: 500px!important;
    }
    #su-generator-choices>span {
      background-color: #800000!important;
      color: white!important;
      border-radius: 4px!important;
      border: none!important;
      width: calc(100% / 3)!important;
    }
    .sui-image {
      color: white!important;
    }
    .mfp-close {
      margin-top: 5px!important;
    }
    .su-generator-button {
      color: #ffffff!important;
      border-color: #800000!important;
      background-color: #800000!important;
    }
    #su-generator .button {
      border-color: #800000!important;
      color: #800000!important;
    }
    .su-generator-button:hover,
    #su-generator .button-primary {
      border-color: #800000!important;
      color: #ffffff!important;
      background-color: #800000!important;
    }
    .su-generator-button svg {
      opacity: 1!important;
    }
    .su-generator-toggle-preview:after {
      content: " (Not styled)";
    }
  </style>';
}
// End Shortcode Editor Styles

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