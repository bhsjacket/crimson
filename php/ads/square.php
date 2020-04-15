<?php
if(!empty(get_field('square_ads', 'option'))) {
    $square_ad = array_rand((get_field('square_ads', 'option')));
    $square_ad = get_field('square_ads', 'option')[$square_ad];
} else {
    $square_ad = array(
        'url' => get_template_directory_uri() . '/images/placeholders/square.png',
        'caption' => get_site_url() . '/advertise',
    );
}
?>

<a <?php if(!empty($square_ad['caption'])) { ?> href="<?php echo esc_url($square_ad['caption']); ?>" <?php } ?>><img class="square" src="<?php echo $square_ad['url'] ?>"></a>