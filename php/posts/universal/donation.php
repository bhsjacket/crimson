<?php if($_COOKIE['donation'] == 'closed' || $_COOKIE['donation'] == 'completed') { ?>
    <script>
        $(document).ready(function(){
            $('.donation-inner').hide();
            $('.donation > *:not(.<?php echo 'donation' . $_COOKIE['donation']; ?>)').hide();
            $('.donation-<?php echo $_COOKIE['donation']; ?>').show();
            $('.donation-closed > .button').click(function(){
                document.cookie = "donation=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            });
        });
    </script>
<?php } ?>

<section id="donate" style="position: relative; bottom: 90px; opacity: 0; "></section>
<section class="donation">
    <div class="donation-inner">
        <?php if($_GET['reminder'] == true) { ?>
        <div class="reminder-alert">
            <i class="far fa-alarm-clock"></i><span>A reminder has been set</span>
            <style>
                .remind-me {
                    display: none;
                }
            </style>
        </div>
        <?php } ?>
        <p>We need to ask for <b>your support</b> for our amazing newspaper. We're one of the premier student newspapers in the nation. In our <b>107-year history</b> we've continuously pushed for <b>excellence in journalism</b> and education.</p>
        <p>The most remarkable fact is this: the <em>Jacket</em> is <b>entirely student-operated</b> and is produced by a dedicated staff of over one hundred student editors, writers, photographers, illustrators, and designers on a very limited budget every week.</p>
        <p>We don't accept any funding from BUSD, so we have to fundraise every dime that is required for printing the newspaper and maintaining our website. Printing costs over $800 each issue, and we print 18 times a year.</p>
        <p>On behalf of every student in the <em>Jacket</em> program, we thank you for your support. <b>Any amount you can contribute</b> helps us achieve our goals. For as long as there are dedicated writers and interested readers—and committed supporters like you—<span class="highlight">the <em>Jacket</em> will continue providing a platform for professional-level student journalism to shine long into the future.</span></p>
        <div class="donation-before">
            <a href="/donate" class="donation-popup button solid light"><i class="fas fa-heart" style="margin-right: 15px;"></i>Donate today</a>
            <a class="button outline dark remind-me" onclick="reminderForm()">Remind me next month</a>
            <img class="payment-methods" src="<?php echo get_template_directory_uri(); ?>/images/payment-methods.png">
        </div>
        <div class="donation-after">

            <form method="post" action="https://emailoctopus.com/lists/d633e517-867e-11ea-a3d0-06b4694bee2a/members/embedded/1.3/add" class="email-octopus-form" data-sitekey="6LdYsmsUAAAAAPXVTt-ovRsPIJ_IVhvYBBhGvRV6">   
                <input id="field_0" name="field_0" type="email" placeholder="Enter your email address">
                <div style="display: none;" class="email-octopus-form-row-hp" aria-hidden="true">
                    <input type="text" name="hpd633e517-867e-11ea-a3d0-06b4694bee2a" tabindex="-1" autocomplete="nope">
                </div>
                <input type="hidden" name="successRedirectUrl" value="<?php echo get_permalink(); ?>/?reminder=true#donate">
                <button type="submit">Remind me</button>
            </form>

            <script src="https://emailoctopus.com/bundles/emailoctopuslist/js/1.4/formEmbed.js"></script>

            <div class="disclaimer-wrapper">
                <p class="disclaimer">We will send you a reminder on <?php echo date("M d, Y", strtotime("+30 days")) ?>.</p>
                <p class="disclaimer close-reminder"><span onclick="closeReminderForm();">Never mind</span></p>
            </div>
        </div>
    </div>
    <div class="donation-closed">
        <p>You've chosen not to donate.</p>
        <a href="/donate" class="button outline dark">Actually, I'd like to donate</a>
    </div>
    <div class="donation-completed">
        <p>Thank you for donating!</p>
        <a href="/donate" class="button outline dark">Donate again</a>
    </div>
</section>