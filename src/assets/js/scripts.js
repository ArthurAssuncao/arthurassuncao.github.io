function fill_skills(){
    $('.skill-value').each(function(){
        var tamanho = $(this).data('skillbar');
        $(this).animate({
            width: tamanho+'%'
        }, 1000);
    });
}

function hide_skills_itens(){
    $("#cv-habilidades ul > li:gt(9)").hide();
}

function show_skills_itens(){
    $("#cv-habilidades ul > li:gt(9)").show(1000);
    // $("#btn_skills_more").hide(900);
}

function hide_prod_cientifica_itens(){
    $("#cv-producao ul > li:gt(2)").hide();
}

function show_prod_cientifica_itens(){
    $("#cv-producao ul > li:gt(2)").show(1000);
    // $("#btn_prod_cientifica_more").hide(900);
}

function hide_premios_itens(){
    $("#cv-awards ul > li:gt(0)").hide();
}

function show_premios_itens(){
    $("#cv-awards ul > li:gt(0)").show(1000);
}

function show_habilidades_itens(){
    show_skills_itens();
    show_prod_cientifica_itens();
    show_premios_itens();
    $("#btn-skill-more").hide(900);
}

function hide_habilidades_itens(){
    hide_skills_itens();
    hide_prod_cientifica_itens();
    hide_premios_itens();
}

function add_habilidades_more_event(){
    $("#btn-skill-more").one('click', show_habilidades_itens);
}

function iniciar_wow(){
    // new WOW().init();
    new WOW({
        boxClass:     'wow-nonmobile',      // default
        animateClass: 'animated', // default
        offset:       0,          // default
        mobile:       false,       // default
        live:         true        // default
    }).init(); //wow-nonmobile
}

// function iniciar_scrollspy(){
//     $('.scrollspy').scrollSpy();
// }

function on_scroll_menu(event){
    var navbarHeight = $("#navbar").height();
    var scrollPos = $(document).scrollTop() + navbarHeight;
    $('#navbar a').each(function() {
        var currLi = $(this);
        // var currLink = $(this).find(">a:first-child");
        var currLink = $(this);
        var refElement = $(currLink.attr("href").substring(1));
        var menuSide = $('.menu_left_side li[data-href="' + currLink.attr("href") + '"]');
        if(typeof refElement != 'undefined' && typeof refElement.position() != 'undefined'){
          if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
              $('#navbar a').removeClass("active");
              $('.menu_left_side ul li').removeClass("active");
              currLi.addClass("active");
              menuSide.addClass("active");
          }
          else{
              currLi.removeClass("active");
              menuSide.removeClass("active");
          }
        }
    });
    var has_item_active = false;
    $('#navbar a').each(function() {
        var currLi = $(this);
        if(currLi.hasClass("active")){
            has_item_active = true;
        }
    });
    if(has_item_active){
        $("#nav_f").addClass("nav-shadow");
    }
    else{
        $("#nav_f").removeClass("nav-shadow");
    }
}

function msg_send(success){
    if (success) {
        $('#form-contact').addClass('animated fadeOutRight');
        $('#form-contact').hide(500);
        $('.form-result-ok').show().addClass('animated fadeInLeft');
        $('.form-result-ok').attr('position', 'relative');
    }else{
        $('#form-contact').addClass('animated fadeOutLeft');
        $('#form-contact').hide(500);
        $('.form-result-error').show().addClass('animated fadeInRight');
        $('.form-result-error').attr('position', 'relative');
    };
}

function hide_form_result(){
    $('.form-result-ok').hide();
    $('.form-result-error').hide();
}

function add_contact_form_click() {
    $('#form-submit').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "//formspree.io/arthur@arthurassuncao.com",
            method: "POST",
            data: {
                message: $('#form-message').val(),
                _replyto: $('#form-email').val(),
                name: $('#form-name').val()},
            dataType: "json",
            success: function(data) {
                msg_send(true);
            },
            error: function(data) {
                msg_send(false);
            }
        });
    });
}

function remove_form_send_by_enter(){
    $(document).on("keypress", "form", function(event) {
        return event.keyCode != 13;
    });
}

$(document).ready(function(){
    remove_form_send_by_enter();
    hide_form_result();
    hide_habilidades_itens();
    fill_skills();
    add_habilidades_more_event();
    iniciar_wow();
    add_contact_form_click();
    $(window).scroll(on_scroll_menu);
    aload();
    // iniciar_scrollspy();
});
