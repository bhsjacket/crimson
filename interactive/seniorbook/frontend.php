<link href="https://berkeleyhighjacket.com/wp-content/themes/crimson/interactive/seniorbook/style.css" rel="stylesheet">
<script src="https://berkeleyhighjacket.com/wp-content/themes/crimson/interactive/seniorbook/javascript.js"></script>

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
[id="<?php echo $_GET['message']; ?>"] {
    background-color: #800000!important;
    color: white!important;
}
</style>
<?php } ?>

<div class="seniorbook wider">
    <?php if(isset($_GET['code'])) { ?>
    <iframe scrolling="no" id="seniorbook" src="https://jeromepaulos.com/bhsjacket/seniorbook/submit.php?code=<?php echo $_GET['code']; ?>"></iframe>
    <!-- <iframe scrolling="no" id="seniorbook" src="http://localhost/wp-content/plugins/seniorbook/submit.php?code=<?php echo $_GET['code']; ?>"></iframe> -->
    <style>
        #seniorbook {
            border: none;
            width: 100%;
            height: 340px;
        }
    </style>
    <?php } else { ?>
    <iframe scrolling="no" id="seniorbook" src="https://jeromepaulos.com/bhsjacket/seniorbook/submit.php"></iframe>
    <!-- <iframe scrolling="no" id="seniorbook" src="http://localhost/wp-content/plugins/seniorbook/submit.php"></iframe> -->
    <style>
        #seniorbook {
            border: none;
            width: 100%;
            height: 180px;
        }
    </style>
    <?php } ?>
    <div class="responses">
        <?php shuffle($data); ?>
        <?php foreach($data as $message) { ?>
        <div class="response <?php echo $message['color']; ?>" id="<?php echo $message['id']; ?>">
            <p class="response-content"><?php echo $message['message']; ?></p>
            <span class="response-name">—<?php echo $message['name']; ?></span>
        </div>
        <?php } ?>
    </div>
</div>