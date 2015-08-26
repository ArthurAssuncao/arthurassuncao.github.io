function fill_skills(){
    $('.skill_bar').each(function(){
        var tamanho = $(this).data('skillbar');
        $(this).animate({
            width: tamanho+'%'
        }, 1000);
    });
}

function em_manutencao(){
    Materialize.toast('O site está em manutenção, volte outro dia!!', 60000);
}

function hide_skills_itens(){
    $("#curriculo_habilidades ul > li:gt(8)").hide(); 
}

function show_skills_itens(){
    $("#curriculo_habilidades ul > li:gt(8)").show();
    $("#btn_skills_more").hide();
}

function add_skills_more_event(){
    $("#btn_skills_more").on('click', show_skills_itens);
}

$(document).ready(function(){
    fill_skills();
    em_manutencao();
    hide_skills_itens();
    add_skills_more_event();
});
