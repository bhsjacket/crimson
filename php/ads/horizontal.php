<?php
if(!empty(get_field('horizontal_ads', 'option'))) {
    $horizontal_ad = array_rand((get_field('horizontal_ads', 'option')));
    $horizontal_ad = get_field('horizontal_ads', 'option')[$horizontal_ad];
} else {
    $horizontal_ad = array(
        'url' => get_template_directory_uri() . '/images/placeholders/horizontal.png',
        'caption' => get_site_url() . '/advertise',
    );
}
?>

<a <?php if(!empty($horizontal_ad['caption'])) { ?> href="<?php echo esc_url($horizontal_ad['caption']); ?>" <?php } ?>><img class="horizontal" src="<?php echo $horizontal_ad['url'] ?>"></a>