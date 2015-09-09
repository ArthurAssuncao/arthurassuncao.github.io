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
}

function onScrollMenu(event){
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
}

$(document).ready(function(){
    fill_skills();
    em_manutencao();
    hide_habilidades_itens();
    add_habilidades_more_event();
    iniciar_wow();
    $(document).on("scroll", onScrollMenu);
});