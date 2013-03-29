$(document).ready(function() {
  muda_tema();
  single_page();
  muda_tamanho_bara_busca();
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
                $hash.fadeIn('fast');
                window.location.hash = endereco;
                $('html, body').animate({scrollTop: $hash.offset().top - 40}, 1000);
                if(!$hash.html()){
                  $hash.html('<div class="circle"></div><div class="circle1"></div>');
                  $hash.delay(500).queue(function(){
                    $(this).load(endereco + " #conteudo > *", function(){
                      //repositorios
                      if(endereco == "repositorios"){
                        /*var gitviewArthurAssuncao = new Gitview({ 
                            user       : 'arthurassuncao',         // any github username
                            domNode    : document.getElementById('repositorios'),  // (optional) domNode to attach to
                            count      : 10,              // (optional) number of repos per widget page
                            showForks  : true,           // (optional) show forked repos, true by default
                            width      : '630px',        // (optional) width of widget / repos
                            theme      : "light",         // (optional) light or dark theme
                            compact    : true           // (optional) compact mode or full mode?
                        });*/
                        $("#repositorios").github({
                          user: "arthurassuncao",
                          show_extended_info: true,
                          show_follows: true,
                          width: "630px",
                          show_repos: 10,
                          oldest_first: false
                        });
                      }
                    });
                  });
                }
               return false;
              });
          }
        }
      }
      else{ //nao ta na home
        $('li[data-slide]').each(function() {
          this.removeAttribute('data-slide');
        });
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

function muda_tema(){
  $("#muda_tema").click(function (e) {
    e.preventDefault();

    // Toggle <link> url
    $link = $("link#darkstrap-link");
    var href = $link.attr("href")
    var css_url = 
      href.length > 0 ?  "" : "css/bootstrap/darkstrap.css"
    $link.attr("href", css_url);

    // Toggle button text
    $this = $(this);
    var cor = $(this).css("background-color");
    var nova_cor = (cor == "rgb(230, 230, 230)" ? "rgb(51, 51, 51)" : "rgb(230, 230, 230)");
    $(this).css("background-color", nova_cor);
  });
}

function muda_tamanho_bara_busca(){
    var tamanho_diferenca = 60;
    $('#barra_busca').focus(function() {
      $('#barra_busca').animate({width:($(this).width()+tamanho_diferenca)+'px'}, 'slow');
    });
    $('#barra_busca').blur(function() {
      $('#barra_busca').animate({width:($(this).width()-tamanho_diferenca)+'px'}, 'slow');
    });
}