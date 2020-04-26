<footer id="footer">
    <div class="footer-top">
        <a href="/#"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-light.svg"></a>
    </div>
    <div class="footer-inner">
        <div class="footer-column">
            <h3>Features</h3>
            <ul class="footer-links">
                <li class="footer-link"><a href="/category/features">Latest Features</a></li>
                <li class="footer-link"><a href="/category/photo-stories">Photo Essays</a></li>
                <li class="footer-link"><a href="/category/multimedia">Multimedia</a></li>
            </ul>
            <div class="footer-awards">
                <h3>Awards</h3>
                <a href="https://www.spj.org"><img src="<?php echo get_template_directory_uri(); ?>/images/awards/spj.jpg"></a>
                <a href="http://studentpress.org/nspa"><img src="<?php echo get_template_directory_uri(); ?>/images/awards/nspa.jpg"></a>
                <a href="https://cspa.columbia.edu"><img src="<?php echo get_template_directory_uri(); ?>/images/awards/cspa.jpg"></a>
                <a href="http://jea.org/wp"><img src="<?php echo get_template_directory_uri(); ?>/images/awards/jea.jpg"></a>
            </div>
        </div>
        <div class="footer-column">
            <h3>Sports</h3>
            <ul class="footer-links">
                <li class="footer-link"><a href="/?s=Basketball">Basketball</a></li>
                <li class="footer-link"><a href="/?s=Baseball">Baseball</a></li>
                <li class="footer-link"><a href="/?s=Football">Football</a></li>
                <li class="footer-link"><a href="/?s=Tennis">Tennis</a></li>
                <li class="footer-link"><a href="/?s=Water+Polo">Water Polo</a></li>
                <li class="footer-link"><a href="/?s=Lacrosse">Lacrosse</a></li>
                <li class="footer-link"><a href="/?s=Softball">Softball</a></li>
                <li class="footer-link" style="font-weight: bold;"><a href="/sports/updates">Scores</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Opinion</h3>
            <ul class="footer-links">
                <li class="footer-link"><a href="/category/opinion">Latest Opinion</a></li>
                <li class="footer-link"><a href="/category/opinion/editorial">Editorial</a></li>
                <li class="footer-link"><a href="/category/opinion/op-ed">Op-Ed</a></li>
            </ul>
            <?php if(!empty( wp_get_nav_menu_items( wp_get_nav_menu_name( 'columnists' ) ) )) { ?>
            <h3>Columnists</h3>
            <ul class="footer-links">
                <?php foreach( wp_get_nav_menu_items( wp_get_nav_menu_name( 'columnists' ) ) as $menu_item ) { ?>
                <li class="footer-link"><a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
        <div class="footer-column">
            <h3>News</h3>
            <ul class="footer-links">
                <li class="footer-link"><a href="/category/news">Latest News</a></li>
                <li class="footer-link"><a href="/?s=Berkeley+High+School">Berkeley High School</a></li>
            </ul>
            <h3>Extras</h3>
            <ul class="footer-links">
                <li class="footer-link"><a href="/about">About</a></li>
                <li class="footer-link"><a href="/about/staff">Staff</a></li>
                <li class="footer-link"><a href="/about/staff/apply">Jobs</a></li>
                <li class="footer-link"><a href="/about/contact">Contact</a></li>
                <li class="footer-link"><a href="mailto:business@bhsjacket.com">Advertise</a></li>
                <li class="footer-link"><a href="/login">Login</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-bottom-inner">
            <div class="footer-copyright">
                <span>© 1912-<?php echo date('Y'); ?> Berkeley High Jacket</span>
            </div>
            <div class="footer-debug">
                <span>Cached <?php echo date('F jS, Y g:i A T'); ?></span>
            </div>
        </div>
    </div>
</footer>

<?php get_template_part('load/footer'); ?>

</body>
</html>