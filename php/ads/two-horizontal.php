<?php
if(!empty(get_field('horizontal_ads', 'option'))) {
    if(count(get_field('horizontal_ads', 'option')) > 1) {
        $horizontal_ad = array_rand(get_field('horizontal_ads', 'option'), 2);
        shuffle($horizontal_ad);
        foreach($horizontal_ad as $ad) {
            $ads[] = get_field('horizontal_ads', 'option')[$ad];
        }
    } else {
        $ads[] = get_field('horizontal_ads', 'option')[array_rand(get_field('horizontal_ads', 'option'))];
        $ads[] = array(
            'caption' => get_site_url() . '/advertise',
            'sizes' => array(
                'medium_large' => get_template_directory_uri() . '/images/placeholders/horizontal.png',
            )
        );
        shuffle($ads);
    }
}

if(!empty(get_field('horizontal_ads', 'option'))) {
?>

<style>
.two-sponsor-block {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: 1fr;
    grid-column-gap: 30px;
    grid-row-gap: 0px;
}
.two-sponsor-block .horizontal {
    width: 100%;
}
@media all and (orientation: portrait) {
    .two-sponsor-block {
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 1fr;
        grid-row-gap: 15px;
    }
    .two-sponsor-block .horizontal {
        grid-area: auto;
    }
}
</style>

<section class="two-sponsor-block wider">

<?php foreach($ads as $ad) { ?>
<a <?php if(!empty($ad['caption'])){ ?>href="<?php echo esc_url($ad['caption']); ?>" <?php } ?>><img class="horizontal" src="<?php echo $ad['sizes']['medium_large'] ?>"></a>
<?php } ?>

</section>

<?php } ?>