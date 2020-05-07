jQuery(window).ready(function(){

    jQuery('.block-editor-page .featured, .block-editor-page .fullscreen, .edit-post-layout__metaboxes .acf-postbox').hide();

    var postTemplate = jQuery('.template-selector select').val();

    if(postTemplate == 'slideshow') {
        var hideThings = setInterval(function(){
            jQuery('.block-editor-block-list__layout, .block-editor-writing-flow__click-redirect').hide();
            if(jQuery('.block-editor-block-list__layout, .block-editor-writing-flow__click-redirect').width() !== null) {
                clearInterval(hideThings);
            }
        }, 100);
        jQuery('.fullscreen, .edit-post-layout__metaboxes .acf-postbox').show();
    } else if(postTemplate == 'slider') {
        jQuery('.featured, .edit-post-layout__metaboxes .acf-postbox').show();
    } else {
        var hideThings = setInterval(function(){
            jQuery('.edit-post-layout__metaboxes .acf-postbox').hide();
            if(jQuery('.edit-post-layout__metaboxes .acf-postbox').width() !== null) {
                clearInterval(hideThings);
            }
        }, 100);
    }

    jQuery('.template-selector select').change(function(){

        postTemplate = jQuery('.template-selector select').val();

        if(postTemplate == 'slideshow') {
            jQuery('.fullscreen, .edit-post-layout__metaboxes .acf-postbox').show();
            jQuery('.featured, .block-editor-block-list__layout, .block-editor-writing-flow__click-redirect').hide();
        } else if(postTemplate == 'slider') {
            jQuery('.featured, .edit-post-layout__metaboxes .acf-postbox, .block-editor-block-list__layout, .block-editor-writing-flow__click-redirect').show();
            jQuery('.fullscreen').hide();
        } else {
            jQuery('.block-editor-block-list__layout, .block-editor-writing-flow__click-redirect').show();
            jQuery('.featured, .fullscreen, .edit-post-layout__metaboxes .acf-postbox').hide();
        }
    })

})