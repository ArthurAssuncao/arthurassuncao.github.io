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
    $("#btn_skills_more").hide(900);
}

function add_skills_more_event(){
    $("#btn_skills_more").on('click', show_skills_itens);
}

function iniciar_wow(){
    new WOW().init();
}

$(document).ready(function(){
    fill_skills();
    em_manutencao();
    hide_skills_itens();
    add_skills_more_event();
    iniciar_wow();
});
