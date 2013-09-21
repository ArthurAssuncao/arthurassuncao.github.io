$(document).ready(function() {
    remover_data_slide();
    //mudar_tamanho_barra_busca();
    //add_evento_gestos_pagina();
});

function mudar_tema(){
    $("#muda_tema").click(function (e) {
        e.preventDefault();

        // Toggle <link> url
        $link = $("link#darkstrap-link");
        var href = $link.attr("href");
        var css_url = href.length > 0 ?  "" : "css/bootstrap/darkstrap.css";
        $link.attr("href", css_url);

        // Toggle button text
        $this = $(this);
        var cor = $(this).css("background-color");
        var nova_cor = (cor == "rgb(230, 230, 230)" ? "rgb(51, 51, 51)" : "rgb(230, 230, 230)");
        $(this).css("background-color", nova_cor);
    });
}

function mudar_tamanho_barra_busca(){
    var tamanho_diferenca = 60;
    $('#barra_busca').focus(function() {
        $('#barra_busca').animate({width:($(this).width()+tamanho_diferenca)+'px'}, 'slow');
    });
    $('#barra_busca').blur(function() {
        $('#barra_busca').animate({width:($(this).width()-tamanho_diferenca)+'px'}, 'slow');
    });
}

function remover_data_slide(){
    var pagina = location.pathname;
    if (pagina != "/"){ //nao ta na home
        $('li[data-slide]').each(function() {
            this.removeAttribute('data-slide');
            //seleciona a pagina no menu
            filha_a = child=(this.firstElementChild || this.firstChild);
            endereco = filha_a.href.replace(location.href.replace(pagina, ''), '');
            $(this).removeClass('selected');
            if(pagina == endereco){
                if(endereco == '/home'){
                    $(this).addClass('selected');
                }
                else if(endereco == '/repositorios'){
                    $(this).addClass('selected');
                }
                else if(endereco == '/curriculo'){
                    $(this).addClass('selected');
                }
                else if(endereco == '/contato'){
                    $(this).addClass('selected');
                }
            }
        });
    }
}

function mudar_pagina_anterior(){
    var pagina = location.pathname;
    var hash = window.location.hash;
    var $hash = $(hash.replace(/#/,'#pagina_'));
    //home
    if(pagina == '/') {
        var novo_local = null;
        if(hash == '' || hash == '#home'){
            novo_local = '#repositorios';
        }
        else if(hash == '#repositorios'){
            novo_local = '#curriculo';
        }
        else if(hash == '#curriculo'){
            novo_local = '#contato';
        }
        if(novo_local != null){
            carregar_pagina($hash, novo_local.replace(/#/,''));
        }
    }
}

function mudar_pagina_posterior(){
    var pagina = location.pathname;
    var hash = window.location.hash;
    var $hash = $(hash.replace(/#/,'#pagina_'));
    //home
    if(pagina == '/') {
        var novo_local = null;
        if(hash == '#repositorios'){
            novo_local = '#home';
        }
        else if(hash == '#curriculo'){
            novo_local = '#repositorios';
        }
        else if(hash == '#contato'){
            novo_local = '#curriculo';
        }
        if(novo_local != null){
            carregar_pagina($hash, novo_local.replace(/#/,''));
        }
    }
}

function add_evento_gestos_pagina(){
    var pagina = $('body');
    var hammer_swipe_left = Hammer(pagina).on("swipeleft", function(event) {
        if(!has_texto_selecionado()){
            mudar_pagina_anterior();
        }
    });
    var hammer_swipe_right = Hammer(pagina).on("swiperight", function(event) {
        if(!has_texto_selecionado()){
            mudar_pagina_posterior();
        }
    });
}