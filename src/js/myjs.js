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

$(document).ready(function(){
    fill_skills();
    em_manutencao();
});
