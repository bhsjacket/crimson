<?php
/**
 * Template for displaying search forms in Crimson
 *
 * @package Crimson
 */
?>
<form id="searchform" method="get" action="<?php echo home_url('/'); ?>">
    <i class="fas fa-search"></i>
    <input type="text" class="search-field" name="s" placeholder="Search..." value="<?php the_search_query(); ?>">
</form>