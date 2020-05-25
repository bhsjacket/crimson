<?php
/**
 * sports = true/false
 * podcast = true/false
 */

$display = get_query_var('display-info');

if($display['sports'] == true Xor $display['podcast'] == true) {
    $posts = 3;
} else if($display['sports'] == true && $display['podcast'] == true) {
    $posts = 2;
} else {
    $posts = 4;
}

$args = array(
	'post_type' => array('post'),
    'post_status' => array('publish'),
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'syndication',
            'terms' => array(
                'glance',
            ),
            'field' => 'slug',
            'include_children' => true,
            'operator' => 'IN',
        )
    ),
    'posts_per_page' => $posts,
);

$query = new WP_Query( $args ); ?>

<section class="glance wider">
<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>
<a href="<?php echo get_permalink(); ?>" class="glance-column">
    <img src='<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), "thumbnail")[0]; ?>'>
    <div class="glance-headline">
        <h2><span><?php echo get_field('kicker'); ?>: </span><?php echo get_field('short_title'); ?></h2>
    </div>
</a>
<?php }} wp_reset_postdata(); ?>

<?php if($display['podcast'] == true) { ?>
<?php
$title = simplexml_load_file('https://anchor.fm/s/eafe278/podcast/rss');
$title = $title->channel->item[0]->title;
?>

<a href="/podcast" class="glance-column glance-podcast">
    <img src='<?php echo get_template_directory_uri(); ?>/images/podcast.png'>
    <div class="glance-headline">
        <h2><span>Podcast: </span><?php echo $title; ?></h2>
    </div>
</a>
<?php } ?>

<?php if($display['sports'] == true) {
    // $json = file_get_contents('http://jeromepaulos.com/bhsjacket/glance/sports_api.php');
    $data = file_get_contents('https://jeromepaulos.com/bhsjacket/coronavirus/data.php?data=berkeley');
    $data = json_decode($data, true);
    $data = array_reverse($data);
    $data = $data[0];
    $date = date('M j', strtotime($data['date']));
    $date = str_replace(' ', '&nbsp;', $date);

    $ac_data = file_get_contents('https://jeromepaulos.com/bhsjacket/coronavirus/data.php?data=alameda');
    $ac_data = json_decode($ac_data, true);
    $ac_data = array_reverse($ac_data);
    $ac_data = $ac_data[0]['attributes'];
?>

<style>
.glance {
    margin-top: 15px!important;
    margin-bottom: -15px!important;
}
[aria-label][data-balloon-pos]:after {
    font-family: 'PT Serif', serif!important;
    font-size: 13px!important;
}
</style>

<?php if(1 > 2) { ?>
    <div class="glance-column glance-sports">
        <div class="glance-row">
            <h2 class="sport"><a href="https://berkeleyhighjacket.com/?s=<?php echo str_replace(' ', '+', $data['sport']); ?>"><?php echo $data['sport']; ?></a></h2>
            <span class="date"><?php echo str_replace(' ', '&nbsp;', $data['date']); ?></span>
        </div>
        <div class="glance-row<?php if($data['home_outcome'] == 'win') { echo ' winner'; } ?>">
            <h2 class="team">Berkeley</h2>
            <h2 class="score"><?php echo $data['home_score']; ?></h2>
        </div>
        <div class="glance-row<?php if($data['home_outcome'] == 'loss') { echo ' winner'; } ?>">
            <h2 class="team"><?php echo $data['away_name']; ?></h2>
            <h2 class="score"><?php echo $data['away_score']; ?></h2>
        </div>
        <span class="updated-msg">Updated Hourly</span>
    </div>
<?php } ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/1.0.4/balloon.min.css">
<style>
        .glance-sports {
            border: none!important;
        }
        .glance-sports span,
        h2.sport a {
            color: white!important;
        }
        .glance-row {
            border-color: #ffffff69!important;
        }
    </style>
<div class="glance-column glance-sports" style="background-color:#800000;color:white;">
    <div class="glance-row">
        <h2 class="sport" aria-label="More data and visuzalitions" data-balloon-pos="down-left"><a href="https://berkeleyhighjacket.com/2020/multimedia/live-coronavirus-data/">Coronavirus Statistics</a></h2>
        <span class="date" aria-label="Latest available data" data-balloon-pos="down-right"><?php echo $date; ?></span>
    </div>
    <div class="glance-row">
        <h2 class="team">Berkeley Total</h2>
        <h2 class="score" style="width:50%"><?php echo number_format($data['bklhj_cumulcases']); ?>&nbsp;<span aria-label="New cases since yesterday" data-balloon-pos="down-right">(+&nbsp;<?php echo number_format($data['bklhj_newcases']); ?>)</span></h2>
    </div>
    <div class="glance-row<?php if($data['home_outcome'] == 'loss') { echo ' winner'; } ?>">
        <h2 class="team">Alameda County Total</h2>
        <h2 class="score" style="width:50%"><?php echo number_format($ac_data['AC_CumulCases']); ?>&nbsp;<span aria-label="New cases since yesterday" data-balloon-pos="down-right">(+&nbsp;<?php echo number_format($ac_data['AC_Cases']); ?>)</span></h2>
    </div>
    <span class="updated-msg">Updated Twice Daily</span>
</div>

<?php } ?>

</section>