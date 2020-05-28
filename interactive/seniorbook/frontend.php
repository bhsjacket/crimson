<?php
if(!empty($_GET['success'])) {
    echo '<script>
        window.history.replaceState(null, null, window.location.pathname);
            prompt("Your message has been submitted! It wil appear on this page once it is approved.\n\nThis URL will link directly to this message.\n\nPress Cmd/Ctrl + C to copy it.", "https://berkeleyhighjacket.com/2020/multimedia/message-board?message=' . $_GET['message_id'] . '");
        </script>';
} else if(!empty($_GET['error'])) {
    echo '<script>
        window.history.replaceState(null, null, window.location.pathname);
        alert("Your message was NOT submitted because the server rejected your image. Please try again with a JPEG/JPG under 10MB. Most phone photos should do.");
        </script>';
}
?>

<link href="https://berkeleyhighjacket.com/wp-content/themes/crimson/interactive/seniorbook/style.css?<?php echo uniqid(); ?>" rel="stylesheet">
<script src="https://berkeleyhighjacket.com/wp-content/themes/crimson/interactive/seniorbook/javascript.js?<?php echo uniqid(); ?>"></script>

<?php
$data = file_get_contents('https://jeromepaulos.com/bhsjacket/seniorbook/messages.json');
$data = json_decode($data, true);
?>

<?php if(!empty($_GET['message'])) { ?>
<script>
$(document).ready(function(){
    $('html, body').animate({
        scrollTop: ($("#<?php echo $_GET['message']; ?>").offset().top - 300)
    }, 1000);
    $("#<?php echo $_GET['message']; ?>").delay(800).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
});
</script>
<style>
.response:not([id="<?php echo $_GET['message']; ?>"]) {
    background-color: #e7e7e7!important;
}
.response[id="<?php echo $_GET['message']; ?>"] {
    background-color: #800000!important;
    color: white!important;
}
</style>
<?php } ?>

<div class="seniorbook wider">
    <input class="search-messages field" type="text" placeholder="Type to search messages...">
    <span target="_top" class="post-message">Post a message</span>
    <div class="form wide">
        <form enctype="multipart/form-data" action="https://jeromepaulos.com/bhsjacket/seniorbook/backend.php" method="POST">
            <textarea required placeholder="Type a message..." maxlength="350" rows="8" id="message" name="message"></textarea>
            <div id="from">
                <span>—</span><input type="text" name="name" class="name" required placeholder="Click to enter your name...">
            </div>
            <div class="colors">
                <input type="radio" class="color" name="color" value="orange" id="orange">
                <label for="orange"></label>

                <input type="radio" class="color" name="color" value="yellow" id="yellow">
                <label for="yellow"></label>

                <input type="radio" class="color" name="color" value="green" id="green">
                <label for="green"></label>

                <input type="radio" class="color" name="color" value="blue" id="blue">
                <label for="blue"></label>

                <input type="radio" class="color" name="color" value="purple" id="purple">
                <label for="purple"></label>

                <input type="radio" class="color" name="color" value="pink" id="pink">
                <label for="pink"></label>

                <input type="radio" class="color" name="color" value="gray" id="gray">
                <label for="gray"></label>
            </div>

            <label for="imageupload"><i class="fas fa-image"></i> Attach image (optional, under 10MB)</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
            <input accept=".jpg,.jpeg" class="field" id="imageupload" type="file" name="image">
            <p class="warning">We only approve messages and images that do not contain <strong>personal attacks, hate speech, or profanity</strong>. Mentioning people by name is okay. Do not include photos of <strong>other people</strong> without their <strong>permission.</strong></p>
            <button type="submit" id="submit">Submit</button>
        </form>
    </div>

    <?php if(!empty($data)) { ?>
    <div class="responses">
        <?php
        shuffle($data);
        $counter = 0;
        foreach($data as $message) { ?>
        <?php if($message['approved'] == true) { ?>

        <div class="response <?php echo $message['color']; ?>" id="<?php echo $message['id']; ?>">
            <?php if($message['image'] !== 'none') { ?>
            <img src="<?php echo $message['image']; ?>">
            <?php } ?>
            <p class="response-content"><?php echo $message['message']; ?></p>
            <span class="response-name">—<?php echo $message['name']; ?></span>
        </div>

        <?php } else { $counter++; }} ?>
    </div>
    <?php if($counter > 0) { ?>
    <p class="unmoderated" style="margin-bottom: -15px;">There <?php if($counter > 1) { echo 'are'; } else { echo 'is'; } ?> <?php echo $counter; ?> message<?php if($counter > 1) { echo 's'; } ?> awaiting review.</p>
    <p class="unmoderated" style="margin-bottom: 200px;">Email <a href="mailto:web@bhsjacket.com?subject=Report%20Seniorboard%20Message&body=Please%20include%20the%20message%20URL%20and%20why%20you%20would%20like%20to%20remove%20this%20message.%20You%20can%20find%20this%20by%20hovering%20over%20the%20message%20you%20want%20to%20report%20and%20clicking%20the%20%22(link)%22%20button%20that%20appears.">web@bhsjacket.com</a> to report a message.</p>
    <?php } ?>
</div>
<?php } else if(isset($counter) && $counter > 0) { ?>
<p class="unmoderated" style="margin-bottom: -15px;">There <?php if($counter > 1) { echo 'are'; } else { echo 'is'; } ?> <?php echo $counter; ?> message<?php if($counter > 1) { echo 's'; } ?> awaiting review.</p>
<p class="unmoderated" style="margin-bottom: 200px;">Email <a href="mailto:web@bhsjacket.com?subject=Report%20Seniorboard%20Message&body=Please%20include%20the%20message%20URL%20and%20why%20you%20would%20like%20to%20remove%20this%20message.%20You%20can%20find%20this%20by%20hovering%20over%20the%20message%20you%20want%20to%20report%20and%20clicking%20the%20%22(link)%22%20button%20that%20appears.">web@bhsjacket.com</a> to report a message.</p>
<?php } else { ?>
<p class="unmoderated" style="margin-bottom: 200px;">Be the first to post!</p>
<?php } ?>