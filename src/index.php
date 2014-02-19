<?php
    require('template/PaginaCached.class.php');
    $pagina = new PaginaCached(__FILE__);
    $pagina->setTitle('Arthur Assunção');
    $pagina->setDescription('Arthur Assunção - Home Page');
    $pagina->setKeywords('Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação, github');
    $pagina->addCSS('css/jquery_github/github.css');
    $pagina->addJavascript('js/feedek/FeedEk.min.js');
    $pagina->addEmbeddedJavascript("
    $(document).ready(function() {
        $('#divRss').FeedEk({
            FeedUrl : 'http://blog.arthurassuncao.com/atom.xml',
            MaxCount : 3,
            ShowDesc : true,
            ShowPubDate: true,
            DescCharacterLimit: 'auto_blogger',
            TitleLinkTarget: '_blank'
        })
    });");
    $pagina->setCanonical($pagina->createCanonicalLink());
    $pagina->iniciaConteudo();
?>
    <div id="pagina_home" class="container pagina col-md-11">
        <!-- Carrousel -->
        <div id="carrousel_projetos" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators middle hidden-xs">
            <li data-target="#carrousel_projetos" data-slide-to="0" class="active"></li>
            <li data-target="#carrousel_projetos" data-slide-to="1" class=""></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img data-src="holder.js/1150x350/auto/#eee:#eaeaea/text: Design Limpo" class="img-responsive" />
              <div class="container">
                <div class="carousel-caption container-fluid">
                  <h1>Design Limpo</h1>
                  <p class="hidden-xs">
                    Ofereça uma experiência melhor para seus visitantes, com interfaces modernas, mais limpas e rápidas, textos mais fáceis de ler e dê a sua empresa uma aparência profissional.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <img data-src="holder.js/1150x350/auto/#eee:#eaeaea/text: Layout Responsivo" class="img-responsive" />
              <div class="container">
                <div class="carousel-caption container-fluid">
                  <h1>Layout Responsivo</h1>
                  <p class="hidden-xs">
                    Seus acessos virão de smartphones, tablets, notebooks e computadores. Ofereça um site que tenha uma excelente aparência em todos dispositivos.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carrousel_projetos" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#carrousel_projetos" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <hr class="linha_carrousel" />
        <div id="blog">
            <h3>Blog</h3>
            <div id="divRss"></div>
        </div>
    </div>
    
    <div id="pagina_repositorios" class="container pagina col-md-11"></div>
    <div id="pagina_curriculo" class="container pagina col-md-11"></div>
    <div id="pagina_contato" class="container pagina col-md-11"></div>
    <br />
<?php
    $pagina->finalizaConteudo();
    $pagina->addJavascript('js/jquery_github/jquery.github.js');
    $pagina->addJavascript('js/index.js');
    $pagina->addJavascript('js/holder/holder.js');
    $embedded_js_footer = "
        $(document).ready(function() {
            var hash = window.location.hash;
            if(hash != ''){
                $('a[data-hash*='+'#pagina_' + hash.replace(/#/,'')+']').click();
            }
        });
    ";
    $pagina->addEmbeddedJavascript($embedded_js_footer);
    echo $pagina->renderizar();
?>