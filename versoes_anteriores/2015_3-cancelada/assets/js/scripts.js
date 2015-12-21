function fill_skills(){
    $('.skill_bar').each(function(){
        var tamanho = $(this).data('skillbar');
        $(this).animate({
            width: tamanho+'%'
        }, 1000);
    });
}

function em_manutencao(){
    // Materialize.toast('O site está em manutenção. Desculpe por qualquer erro :(', 60000);
}

function hide_skills_itens(){
    $("#curriculo_habilidades ul > li:gt(9)").hide(); 
}

function show_skills_itens(){
    $("#curriculo_habilidades ul > li:gt(9)").show(1000);
    // $("#btn_skills_more").hide(900);
}

function hide_prod_cientifica_itens(){
    $("#curriculo_producao ul > li:gt(0)").hide(); 
}

function show_prod_cientifica_itens(){
    $("#curriculo_producao ul > li:gt(0)").show(1000);
    // $("#btn_prod_cientifica_more").hide(900);
}

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

function ativar_modals(){
    $('.modal-trigger').leanModal({
        in_duration: 400, // Transition in duration
        out_duration: 300 // Transition out duration);
    });
    $('.modal-trigger-custom').each(function(){
        var target = $(this).data('target');
        $(this).click(function(){
            $('#'+target).openModal();
        });
    });
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

function iniciar_parallax(){
    $('.parallax').parallax();
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
        var refElement = $(currLink.attr("href"));
        var menuSide = $('.menu_left_side li[data-href="' + currLink.attr("href") + '"]');
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
    });
    var has_item_active = false;
    $('#navbar a').each(function() {
        var currLi = $(this);
        if(currLi.hasClass("active")){
            has_item_active = true;
        }
    });
    if(has_item_active){
        $(".navbar").addClass("nav_shadow");
    }
    else{
        $(".navbar").removeClass("nav_shadow");
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
    em_manutencao();
    remove_form_send_by_enter();
    hide_form_result();
    hide_habilidades_itens();
    fill_skills();
    add_habilidades_more_event();
    iniciar_wow();
    add_contact_form_click();
    $(window).scroll(on_scroll_menu);
    ativar_modals();
    iniciar_parallax();
    // iniciar_scrollspy();
});

// AngularJS funcoes
// skillApp.js
angular.module('skillApp', [])
.controller('skillController', function($scope) {
    $scope.sortType     = 'value'; // set the default sort type
    $scope.sortReverse  = false;  // set the default sort order

    // cria a lista
    $scope.skills = [
        { name: 'android', value: 70, msg: 'Trabalhei por 1,25 ano e fiz um curso de Android, além de alguns projetos.' },
        { name: 'python', value: 60, msg: 'Trabalhei por 1,25 ano, fiz um site e também um curso de Python, além de vários projetos, inclusive no mestrado.' },
        { name: 'JavaScript/jQuery', value: 60, msg: 'Trabalhei em alguns sites, extensões para o Chrome e projetos.' },
        { name: 'R', value: 70, msg: 'Utilizo em projetos do mestrado.' },
        { name: 'HTML5/CSS3/SASS', value: 70, msg: 'Trabalhei em alguns sites, extensões para o Chrome e alguns projetos.' },
        { name: 'Twitter Bootstrap 2.x - 3.x', value: 70, msg: 'Trabalhei em alguns sites utilizando Bootstrap, extensões para o Chrome e projetos.' },
        { name: 'Git (Controle de Versão)', value: 90, msg: 'Utilizo Git desde 2012 em boa parte dos projetos que participo, além de ter trabalhado por 1,25 ano e de utilizar no mestrado.' },
        { name: 'Design Responsivo', value: 70, msg: 'Trabalhei em alguns sites com Design Responsivo.' },
        { name: 'PHP', value: 40, msg: 'Trabalhei por alguns meses, além de criar as versões anteriores deste site e alguns projetos em PHP.' },
        { name: 'Java/Java Web', value: 50, msg: 'Trabalhei por alguns meses com Java Web e desenvolvi alguns projetos em Java.' },
        { name: 'C++', value: 50, msg: 'Participei de projetos utilizando C++ e utilizei no mestrado.' },
        { name: 'SQL', value: 60, msg: 'Trabalhei por 1,5 ano utilizando SQL, com o MySQL(1,25 ano) e Postgree(0,25 ano).' },
        { name: 'Objective-C (Programação para iOS)', value: 20, msg: 'Aprendi no mestrado cursando uma disciplina de desenvolvimento móvel' },
    ];
    $scope.levels = [
        { name: 'básico', value_min: 0, value_max: 39 },
        { name: 'intermediário', value_min: 40, value_max: 69 },
        { name: 'avançado', value_min: 70, value_max: 89 },
        { name: 'expert', value_min: 90, value_max: 100 }
    ];
    $scope.generate_level = function(value) {
        if(value >= $scope.levels[3].value_min){
            return $scope.levels[3].name;
        }
        else if(value >= $scope.levels[2].value_min){
            return $scope.levels[2].name;
        }
        else if(value >= $scope.levels[1].value_min){
            return $scope.levels[1].name;
        }
        else if(value >= $scope.levels[0].value_min){
            return $scope.levels[0].name;
        }
        return 'indefinido';
    }

});