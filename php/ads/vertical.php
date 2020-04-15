<?php
if(!empty(get_field('vertical_ads', 'option'))) {
    $vertical_ad = array_rand((get_field('vertical_ads', 'option')));
    $vertical_ad = get_field('vertical_ads', 'option')[$vertical_ad];
} else {
    $vertical_ad = array(
        'url' => get_template_directory_uri() . '/images/placeholders/vertical.png',
        'caption' => get_site_url() . '/advertise',
    );
}
?>

<a <?php if(!empty($vertical_ad['caption'])) { ?> href="<?php echo esc_url($vertical_ad['caption']); ?>" <?php } ?>><img class="vertical" src="<?php echo $vertical_ad['url'] ?>"></a>