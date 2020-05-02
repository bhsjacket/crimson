<?php if($_COOKIE['donation'] !== 'closed' && $_COOKIE['donation'] !== 'completed') { ?>

<script>
    function closeDonationBanner() {
        document.cookie = "donation=closed; expires=<?php echo date('D, d M Y H:i:s', strtotime("+1 week")) . ' UTC'; ?>";
        $('.donation-banner').slideUp();
    };
</script>

<section class="donation-banner" id="donation_banner">
    <div class="donation-banner-inner">
        <?php if($_GET['donation'] !== 'completed') { ?>
        <div class="donation-banner-text">
            <i class="far fa-newspaper"></i>
            <p>Any amount you can contribute will help the <em>Jacket</em> to continue providing a platform for <strong>professional-level student journalism</strong> long into the future.</p>
        </div>
        <div class="donation-banner-form">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                <input type="hidden" name="cmd" value="_donations" />
                <input type="hidden" name="business" value="bhsasb@berkeley.net" />
                <input type="hidden" name="item_name" value="Donation to the Berkeley High Jacket" />
                <input type="hidden" name="currency_code" value="USD" />
                <input type="hidden" name="return" value="<?php echo get_site_url() . $_SERVER['REQUEST_URI']; ?>?donation=completed" />
                <select name="amount">
                    <option value="10.00">$10</option>
                    <option value="25.00" selected>$25</option>
                    <option value="50.00">$50</option>
                    <option value="100.00">$100</option>
                    <option value>Other</option>
                </select>
                <input type="submit" value="Support the Jacket">
            </form>
            <button class="donation-banner-close" onclick="closeDonationBanner();">Hide</button>
        </div>
        <?php } else { ?>
        <h1 class="donation-thanks">Thank you for your donation!</h1>
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.2.0/dist/confetti.browser.min.js"></script>
        <script>
            $(document).ready(function(){
                document.cookie = "donation=completed; expires=<?php echo date('D, d M Y H:i:s', strtotime("+1 month")) . ' UTC'; ?>";
                var duration = 5 * 1000;
                var animationEnd = Date.now() + duration;
                var skew = 1;

                (function frame() {
                    var timeLeft = animationEnd - Date.now();
                    var ticks = Math.max(200, 500 * (timeLeft / duration));
                    skew = Math.max(0.8, skew - 0.001);

                    confetti({
                        particleCount: 1,
                        startVelocity: 0,
                        ticks: ticks,
                        gravity: 0.5,
                        origin: {
                            x: Math.random(),
                            // since particles fall down, skew start toward the top
                            y: (Math.random() * skew) - 0.2
                        },
                        colors: ['#ffffff'],
                        shapes: ['rectangle']
                    });

                    if (timeLeft > 0) {
                        requestAnimationFrame(frame);
                    }
                }());
                setTimeout( function() {
                        $('.donation-banner').slideUp();
                    }, 6000);
            });
        </script>
        <?php } ?>
    </div>
</section>

<?php } ?>