<div id="comments">
    <div id="disqus_thread"></div>
    <script>
        var disqus_config = function() {
            this.page.url = '<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>';
            this.page.identifier = '<?php echo get_the_id(); ?>';
            this.page.title = '<?php echo get_the_title(); ?>';
        };
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://bhsjkt.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the comments.</noscript>
</div>
<?php /*
<div id="comments">
    <div id="hyvor-talk-view"></div>
    <script type="text/javascript">
        var HYVOR_TALK_WEBSITE = 424; // DO NOT CHANGE THIS
        var HYVOR_TALK_CONFIG = {
            url: '<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>',
            id: '<?php echo get_the_ID(); ?>'
        };
    </script>
    <script async type="text/javascript" src="//talk.hyvor.com/web-api/embed"></script>
</div>
*/ ?>