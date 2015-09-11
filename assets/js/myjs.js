function fill_skills(){
    $('.skill_bar').each(function(){
        var tamanho = $(this).data('skillbar');
        $(this).animate({
            width: tamanho+'%'
        }, 1000);
    });
}

function em_manutencao(){
    Materialize.toast('O site está em manutenção. Desculpe por qualquer erro :(', 60000);
}

function hide_skills_itens(){
    $("#curriculo_habilidades ul > li:gt(8)").hide(); 
}

function show_skills_itens(){
    $("#curriculo_habilidades ul > li:gt(8)").show(1000);
    // $("#btn_skills_more").hide(900);
}

// function add_skills_more_event(){
//     $("#btn_skills_more").on('click', show_skills_itens);
// }

function hide_prod_cientifica_itens(){
    $("#curriculo_producao ul > li:gt(0)").hide(); 
}

function show_prod_cientifica_itens(){
    $("#curriculo_producao ul > li:gt(0)").show(1000);
    // $("#btn_prod_cientifica_more").hide(900);
}

// function add_prod_cientifica_more_event(){
//     $("#btn_prod_cientifica_more").on('click', show_prod_cientifica_itens);
// }

function show_habilidades_itens(){
    show_skills_itens();
    show_prod_cientifica_itens();
    $("#btn_habilidades_more").hide(900);
}

function hide_habilidades_itens(){
    hide_skills_itens();
    hide_prod_cientifica_itens();
}

function add_habilidades_more_event(){
    $("#btn_habilidades_more").on('click', show_habilidades_itens);
}

function iniciar_wow(){
    new WOW().init();
    new WOW({
        boxClass:     'wow-nonmobile',      // default
        animateClass: 'animated', // default
        offset:       0,          // default
        mobile:       false,       // default
        live:         true        // default
    }).init(); //wow-nonmobile
}

function on_scroll_menu(event){
    var navbarHeight = $("#nav_f").height();
    var scrollPos = $(document).scrollTop() + navbarHeight;
    $('#nav_f li').each(function() {
        var currLi = $(this);
        var currLink = $(this).find(">a:first-child");
        var refElement = $(currLink.attr("href"));
        var menuSide = $('.menu_left_side li[data-href="' + currLink.attr("href") + '"]');
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#nav_f ul li').removeClass("active");
            $('.menu_left_side ul li').removeClass("active");
            currLi.addClass("active");
            menuSide.addClass("active");
        }
        else{
            currLi.removeClass("active");
            menuSide.removeClass("active");
        }
    });
    var has_item_active = false;
    $('#nav_f li').each(function() {
        var currLi = $(this);
        if(currLi.hasClass("active")){
            has_item_active = true;
        }
    });
    if(has_item_active){
        $("#nav_f").addClass("nav_shadow");
    }
    else{
        $("#nav_f").removeClass("nav_shadow");
    }
}

function msg_send(success){
    if (success) {
        $('#form-contact').addClass('animated fadeOutRight');
        $('#form-contact').hide(500);
        $('.form-result-ok').show().addClass('animated fadeInLeft');
    }else{
        $('#form-contact').addClass('animated fadeOutLeft');
        $('#form-contact').hide(500);
        $('.form-result-error').show().addClass('animated fadeInRight');
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

$(document).ready(function(){
    em_manutencao();
    hide_form_result();
    hide_habilidades_itens();
    fill_skills();
    add_habilidades_more_event();
    iniciar_wow();
    add_contact_form_click();
    $(document).on("scroll", on_scroll_menu);
});

