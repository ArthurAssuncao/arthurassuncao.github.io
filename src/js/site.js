$(document).ready(function() {
  remove_data_slide();
  muda_tamanho_barra_busca();
});

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

function muda_tamanho_barra_busca(){
    var tamanho_diferenca = 60;
    $('#barra_busca').focus(function() {
      $('#barra_busca').animate({width:($(this).width()+tamanho_diferenca)+'px'}, 'slow');
    });
    $('#barra_busca').blur(function() {
      $('#barra_busca').animate({width:($(this).width()-tamanho_diferenca)+'px'}, 'slow');
    });
}

function remove_data_slide(){
  if (location.pathname != "/"){ //nao ta na home
    $('li[data-slide]').each(function() {
      this.removeAttribute('data-slide');
    });
  }
}