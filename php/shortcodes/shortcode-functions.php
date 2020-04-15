<?php
// Shortcode Editor Styles
add_action('admin_head', 'shortcode_styles');

function shortcode_styles() {
  echo '<style>
    #su-generator-tools,
    #su-generator-search-pro-tip,
    #su-generator-filter,
    .su-generator-presets {
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
add_filter( 'su/data/shortcodes', 'remove_su_shortcodes' );

function remove_su_shortcodes( $shortcodes ) {

  unset( $shortcodes['button'] );
  unset( $shortcodes['heading'] );
  unset( $shortcodes['tabs'] );
  unset( $shortcodes['tab'] );
  unset( $shortcodes['spoiler'] );
  unset( $shortcodes['accordion'] );
  unset( $shortcodes['divider'] );
  unset( $shortcodes['spacer'] );
  unset( $shortcodes['highlight'] );
  unset( $shortcodes['label'] );
  unset( $shortcodes['quote'] );
  unset( $shortcodes['pullquote'] );
  unset( $shortcodes['dropcap'] );
  unset( $shortcodes['row'] );
  unset( $shortcodes['column'] );
  unset( $shortcodes['list'] );
  unset( $shortcodes['service'] );
  unset( $shortcodes['box'] );
  unset( $shortcodes['note'] );
  unset( $shortcodes['expand'] );
  unset( $shortcodes['lightbox'] );
  unset( $shortcodes['lightbox_content'] );
  unset( $shortcodes['tooltip'] );
  unset( $shortcodes['private'] );
  unset( $shortcodes['youtube'] );
  unset( $shortcodes['youtube_advanced'] );
  unset( $shortcodes['vimeo'] );
  unset( $shortcodes['dailymotion'] );
  unset( $shortcodes['audio'] );
  unset( $shortcodes['video'] );
  unset( $shortcodes['table'] );
  unset( $shortcodes['csv_table'] );
  unset( $shortcodes['permalink'] );
  unset( $shortcodes['members'] );
  unset( $shortcodes['guests'] );
  unset( $shortcodes['feed'] );
  unset( $shortcodes['menu'] );
  unset( $shortcodes['subpages'] );
  unset( $shortcodes['siblings'] );
  unset( $shortcodes['map'] );
  unset( $shortcodes['image_carousel'] );
  unset( $shortcodes['slider'] );
  unset( $shortcodes['custom_gallery'] );
  unset( $shortcodes['posts'] );
  unset( $shortcodes['dummy_text'] );
  unset( $shortcodes['dummy_image'] );
  unset( $shortcodes['animate'] );
  unset( $shortcodes['meta'] );
  unset( $shortcodes['user'] );
  unset( $shortcodes['post'] );
  unset( $shortcodes['template'] );
  unset( $shortcodes['arcade'] );
  unset( $shortcodes['scheduler'] );
  unset( $shortcodes['splash'] );
  unset( $shortcodes['exit_popup'] );
  unset( $shortcodes['panel'] );
  unset( $shortcodes['photo_panel'] );
  unset( $shortcodes['icon_panel'] );
  unset( $shortcodes['icon_text'] );
  unset( $shortcodes['progress_pie'] );
  unset( $shortcodes['progress_bar'] );
  unset( $shortcodes['member'] );
  unset( $shortcodes['section'] );
  unset( $shortcodes['pricing_table'] );
  unset( $shortcodes['testimonial'] );
  unset( $shortcodes['icon'] );
  unset( $shortcodes['content_slider'] );
  unset( $shortcodes['shadow'] );
  unset( $shortcodes['gmap'] );
  unset( $shortcodes['carousel'] );
  unset( $shortcodes['qrcode'] );

  return $shortcodes;

}
// End Remove Shortcodes