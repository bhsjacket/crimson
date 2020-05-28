$(document).ready(function(){
    $(".search-messages").keyup(function(){
        var filter = $(this).val()
        $(".responses .response .response-content").each(function(){
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).parent().hide();
            } else {
                $(this).parent().show();
            }
        });
    });
})

$(document).ready(function(){
    $('.color').click(function(){
        $('#message, #from').removeClass();
        $('#message, #from').addClass($(this).attr('value'));
    });

    $('.post-message').click(function(){
        $('.post-message').slideUp();
        $('.form').slideDown();
        $('#message').focus();
    });

    var random = Math.floor(Math.random()*$(".color").length);
    $(".color").eq(random).click();

    $('.response-name').click(function(){
        prompt('This URL will link directly to this message.\n\nPress Cmd/Ctrl + C to copy it.', 'https://berkeleyhighjacket.com/2020/multimedia/message-board?message=' + $(this).parent().attr('id'));
    });

    $('#imageupload').change(function(){
        $('label[for="imageupload"]').text(document.getElementById("imageupload").files[0].name);
    })
});