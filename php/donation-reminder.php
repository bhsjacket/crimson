<?php require_once("../../../../wp-load.php"); ?>

<script>
    alert('<?php echo $_POST["email"] ?>');
</script>

<?php // wp_redirect($_POST['url']); exit; ?>

<?php
function donation_reminder() {
    if(!empty($_POST['email'])) {
        $to = array($_POST["email"]);
    } else {
        $to = array($_GET["email"]);
    };
    $subject = 'Donation reminder';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: Berkeley High Jacket';
    $message = 'Your message';

    wp_mail( $to, $subject, $message, $headers );
}
add_action( 'donation_reminder','donation_reminder' );
wp_schedule_single_event(strtotime("+1 " . $_GET['time']), 'donation_reminder');
?>