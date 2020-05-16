$(document).ready(function(){
    $('.color').click(function(){
        $('#message, #from').removeClass();
        $('#message, #from').addClass($(this).attr('value'));
    });

    var random = Math.floor(Math.random()*$(".color").length);
    $(".color").eq(random).click();

    $('.response-name').click(function(){
        prompt('This URL will link directly to this message.\n\nPress Cmd/Ctrl + C to copy it.', 'https://berkeleyhighjacket.com/2020/multimedia/message-board?message=' + $(this).parent().attr('id'));
    });
});