$(document).ready(function() {
    decodificaEmail();
    criaToolTip();
});

// Tooltip only Text
function criaToolTip(){
    $('*[data-tooltip]').each(function() {
        $(this).hover(function(){
            // Hover over code
            var title_bak = $(this).attr('title');
            var tooltip =  $(this).data('tooltip');
            $(this).data('tipText', title_bak).removeAttr('title');
            $('<span class="tooltip_text"></span>')
                .text(tooltip)
                .appendTo('body')
                .fadeIn('slow');
        }, function() {
            // Hover out code
            $(this).attr('title', $(this).data('tipText'));
            $('.tooltip_text').remove();
        }).mousemove(function(e) {
            var mousex = e.pageX + 20; //Get X coordinates
            var mousey = e.pageY + 10; //Get Y coordinates
            $('.tooltip_text')
                .css({ top: mousey, left: mousex })
        });
    });
}

function decodificaEmail(){ //email em uriEncode
    $('[data-email]').each(function(){
        var email = $(this).data('email');
        var email_decodificado = decodeURIComponent(email);
        $(this).html(email_decodificado);
    });
}