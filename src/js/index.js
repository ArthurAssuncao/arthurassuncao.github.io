$(document).ready(function() {
  single_page();
});

function single_page(){
  /* based in http://www.adventuresinwebdesign.com/samples/anchors/blog/ */
  $('a[data-hash*=#]').each(function() {
      var hash = this.getAttribute('data-hash');
      var $hash = $(hash);
      var endereco = hash.replace(/#pagina_/,'');
      if ( location.pathname == "/"){
        if(location.hostname == this.hostname && endereco ) {
          var $targetId = $hash;
          var $targetAnchor = $('[name=' + endereco +']');
          var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
            if ($target) {
              //var targetOffset = $target.offset().top;
              $(this).click(function() {
                  return carregar_pagina($hash, endereco);
              });
          }
        }
      }
    });
  $('li[data-slide]').each(function() {
    $(this).click(
      function() {
        $(this).addClass('selected');
      },
      function() {
        $(this).removeClass('selected');
      }
    );
  });
}

function eventoCurriculo(){
  $('.skill_bar').each(function(){
    var tamanho = $(this).data('skillbar');
    $(this).animate({
      width: tamanho+'%'
    }, 1500);
  });
}

function carregar_pagina($hash, endereco){
  $hash.fadeIn('fast');
  window.location.hash = endereco;
  $('html, body').animate({scrollTop: $hash.offset().top - 40}, 1000);
  if(!$hash.html()){
    $hash.html('<div class="circle"></div><div class="circle1"></div>');
    var $pagina_temp = $('<div id="pagina_temp" style="display: none"></div>');
    $pagina_temp.appendTo("#conteudo");
    var terminou_delay = false;
    var terminou_ajax = false;
    $pagina_temp.load(endereco, {exibir_header: false, exibir_footer: false}, function(){
      //repositorios
      if(endereco == "repositorios"){
        $("#repositorios").github({
          user: "arthurassuncao",
          show_extended_info: true,
          show_follows: true,
          width: "630px",
          show_repos: 10,
          oldest_first: false
        });
      }
      else if(endereco == "portfolio"){
        
      }
      else if(endereco == "contato"){
        document.form_contato.envia.value = 'true';
      }
      else if(endereco == "curriculo"){
        decodificaEmail();
        eventoCurriculo();
      }
      criaToolTip(); //cria o tooltip das novas tags
      terminou_ajax = true;
      if(terminou_delay == true){
        $hash.html("");
        $pagina_temp.children().each(function () {
            $(this).appendTo($hash);
        });
        $pagina_temp.remove();
      }
    });
    $hash.delay(500).queue(function(){
      terminou_delay = true;
      if(terminou_ajax == true){
        $hash.html("");
        $pagina_temp.children().each(function () {
            $(this).appendTo($hash);
        });
        $pagina_temp.remove();
      }
    });
  }
 return false;
}