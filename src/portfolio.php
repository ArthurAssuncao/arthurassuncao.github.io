<?php
    require('template/PaginaCached.class.php');
    $pagina = new PaginaCached(__FILE__);
    $pagina->setTitle('Portfolio - Arthur Assunção');
    $pagina->setDescription('Portfolio de Arthur Assuncao');
    $pagina->setKeywords('informacoes, portfolio, websites, programas, arthur assuncao');
    $pagina->setCanonical($pagina->createCanonicalLink());
    /*$pagina->addCSS('js/imageflow/imageflow.min.css');
    $pagina->addCSS('js/bootstrap-lightbox/bootstrap-lightbox.min.css');*/
    $pagina->iniciaConteudo();
?>
    <h3>Portfolio</h3>
      
    <div id="portfolio_slide" class="imageflow">
        <img id="imagem_addmob_site" src="img/portfolio/apresentacao_site_addmob_reflexo.jpg" longdesc="URL_1" width="200" height="200" alt="<a href='http://addmob.com.br'>Website Addmob.com.br</a>" class="img-responsive" />
        <img id="imagem_addmob_site" src="img/portfolio/apresentacao_site_addmob_reflexo.jpg" longdesc="URL_1" width="200" height="200" alt="Website Addmob.com.br" class="img-responsive" />
    </div>

    <div id="lightbox_addmob_site" class="lightbox fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="lightbox-dialog">
            <div class='lightbox-content'>
                <img src="img/portfolio/apresentacao_site_addmob_reflexo.jpg" class="img-responsive" />
                <div>
                    <p>Website Addmob.com.br</p>
                </div>
            </div>
        </div>
    </div>

<?php
    $pagina->finalizaConteudo();
    $pagina->addJavascript('js/imageflow/imageflow.min.js');
    $pagina->addJavascript('js/bootstrap-lightbox/bootstrap-lightbox.min.js');
    $embedded_js_footer = "
        domReady(function(){
            var imageFlow = new ImageFlow();
            imageFlow.init({
                ImageFlowID: 'portfolio_slide',
                /*reflectionGET: '&bgc=ffffff&fade_start=20%',*/
                reflections: false,
                reflectionP: 0.0,
                opacity: true,
                circular: true,
                glideToStartID: false,
                onClick: function() {\$('#lightbox_' + this.id.replace('imagem_','')).lightbox({
                    show: true,
                    resizeToFit: true
                    });}
            });
        });
    ";
    $pagina->addEmbeddedJavascript($embedded_js_footer);
    echo $pagina->renderizar();
?>