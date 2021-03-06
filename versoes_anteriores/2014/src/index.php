<?php
    require('template/PaginaCached.class.php');
    $pagina = new PaginaCached(__FILE__);
    $pagina->setTitle('Arthur Assunção');
    $pagina->setDescription('Arthur Assunção - Home Page');
    $pagina->setKeywords('Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação, github');
    $pagina->addCSS('css/jquery_github/github.css');
    $pagina->addJavascript('js/feedek/FeedEk.min.js');
    $pagina->addCSS('js/imageflow/imageflow.min.css');
    $pagina->addCSS('js/bootstrap-lightbox/bootstrap-lightbox.min.css');
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
        <h3>Blog</h3>
        <div id="divRss"></div>
    </div>
    
    <div id="pagina_portfolio" class="container pagina col-md-11"></div>
    <div id="pagina_repositorios" class="container pagina col-md-11"></div>
    <div id="pagina_curriculo" class="container pagina col-md-11"></div>
    <div id="pagina_contato" class="container pagina col-md-11"></div>
    <br />
<?php
    $pagina->finalizaConteudo();
    $pagina->addJavascript('js/jquery_github/jquery.github.js');
    $pagina->addJavascript('js/imageflow/imageflow.min.js');
    $pagina->addJavascript('js/bootstrap-lightbox/bootstrap-lightbox.min.js');
    $pagina->addJavascript('js/index.js');
    $embedded_js_footer = "
        $(document).ready(function() {
            var hash = window.location.hash;
            if(hash != ''){
                $('a[data-hash*='+'#pagina_' + hash.replace(/#/,'')+']').click();
            }
        });
    ";
    echo $pagina->renderizar();
?>