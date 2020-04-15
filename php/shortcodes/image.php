<?php
/**
 * {{type}} is a required dropdown with the following values that defaults to normal-image:
 * normal-image | Normal
 * wider-image | Wide
 * full-width-image | Full-Width Image
 * 
 * {{src}} is a required media library field (that returns a medium_large image if possible)
 * 
 * {{caption}} is an optional textarea field
 * 
 * {{source}} is a required text field
 */
?>

<div class="{{type}} image-in-post">
    <img src="{{src}}">
    <div class="caption-group">
        <div class="caption column">
            <p>{{caption}}</p>
        </div>
        <div class="photographer column">
            <p>{{source}}</p>
        </div>
    </div>
</div>